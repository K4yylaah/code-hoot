<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required', 
                'email',
                'regex:/^[a-zA-Z0-9][a-zA-Z0-9._%+-]*@(edu\.)?esiee-it\.fr$/',
                function ($attribute, $value, $fail) {
                    // Vérification supplémentaire pour éviter les doubles points
                    if (str_contains($value, '..')) {
                        $fail('Format d\'email invalide.');
                    }
                }
            ]
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Cet email n\'est pas enregistré.']);
        }

        // Nettoyer les anciens OTP
        Otp::where('user_id', $user->id)->where('expires_at', '<', now())->delete();

        // Générer et sauvegarder l'OTP
        $otp = Otp::create([
            'user_id' => $user->id,
            'otp' => Otp::generateOtp(),
            'expires_at' => now()->addMinutes(15)
        ]);

        // Réinitialiser les tentatives
        session()->forget('otp_attempts');

        // Envoyer l'email avec l'OTP
        Mail::send('emails.otp', ['otp' => $otp->otp], function($message) use ($request) {
            $message->to($request->email)
                   ->subject('Code de vérification Codehoot');
        });

        session(['email' => $request->email]);
        return redirect('/verify');
    }

    public function register(Request $request)
    {
        Log::info('Register method called', [
            'csrf_token' => $request->input('_token'),
            'session_token' => session()->token(),
            'session_id' => session()->getId()
        ]);

        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                'unique:users', 
                'regex:/^[a-zA-Z0-9][a-zA-Z0-9._%+-]*@(edu\.)?esiee-it\.fr$/',
                function ($attribute, $value, $fail) {
                    // Vérification supplémentaire pour éviter les doubles points
                    if (str_contains($value, '..')) {
                        $fail('Format d\'email invalide.');
                    }
                }
            ],
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Générer et envoyer l'OTP
        $otp = Otp::create([
            'user_id' => $user->id,
            'otp' => Otp::generateOtp(),
            'expires_at' => now()->addMinutes(15)
        ]);

        Mail::send('emails.otp', ['otp' => $otp->otp], function($message) use ($request) {
            $message->to($request->email)
                   ->subject('Code de vérification Codehoot');
        });

        session(['email' => $request->email]);
        return redirect('/verify');
    }

    public function showVerifyOtpForm()
    {
        if (!session('email')) {
            return redirect()->route('login');
        }
        return view('verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        Log::info('Début de la vérification OTP', [
            'session_email' => session('email'),
            'otp_submitted' => $request->otp,
            'token' => $request->_token,
            'session_token' => session('_token')
        ]);

        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        if (!session('email')) {
            Log::warning('Pas d\'email en session');
            return redirect()->route('login');
        }

        $user = User::where('email', session('email'))->first();
        
        if (!$user) {
            Log::warning('Utilisateur non trouvé', ['email' => session('email')]);
            return redirect()->route('login');
        }

        // Nettoyer les anciens OTP
        Otp::where('expires_at', '<', now())->delete();

        // Vérifier le nombre de tentatives
        $attempts = session('otp_attempts', 0);
        if ($attempts >= 3) {
            Log::warning('Trop de tentatives', ['user_id' => $user->id]);
            session()->forget(['email', 'otp_attempts']);
            return redirect()->route('login')
                ->withErrors(['email' => 'Trop de tentatives. Veuillez recommencer.']);
        }

        Log::info('Utilisateur trouvé', ['user_id' => $user->id]);

        $otp = Otp::where('user_id', $user->id)
                  ->where('otp', $request->otp)
                  ->where('used', false)
                  ->where('expires_at', '>', now())
                  ->latest()
                  ->first();

        if (!$otp) {
            session(['otp_attempts' => $attempts + 1]);
            Log::warning('OTP invalide ou expiré', [
                'user_id' => $user->id,
                'submitted_otp' => $request->otp,
                'attempts' => $attempts + 1
            ]);
            return back()->withErrors(['otp' => 'Code incorrect ou expiré']);
        }

        // Réinitialiser les tentatives en cas de succès
        session()->forget('otp_attempts');

        Log::info('OTP valide trouvé', ['otp_id' => $otp->id]);

        // Régénérer la session avant la connexion
        session()->regenerate();
    
        // Marquer l'OTP comme utilisé
        $otp->update(['used' => true]);

        // Authentifier l'utilisateur avec le token remember
        Auth::login($user, true);

        if (!Auth::check()) {
            Log::error('Échec de l\'authentification après Auth::login()', [
                'user_id' => $user->id
            ]);
            return back()->withErrors(['auth' => 'Erreur d\'authentification']);
        }

        Log::info('Utilisateur authentifié avec succès', [
            'user_id' => $user->id,
            'auth_check' => Auth::check()
        ]);

        // Nettoyer la session OTP
        session()->forget('email');
        
        // Régénérer le jeton CSRF
        session()->regenerateToken();

        return redirect()->intended('/account');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('email');
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect('/');
    }
}
