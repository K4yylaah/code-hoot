<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        // Quiz créés par l'utilisateur
        $quizCreatedCount = $user->quizzes()->count();
        
        // Quiz joués par l'utilisateur (nombre de quiz différents joués)
        $quizPlayedCount = $user->scores()->distinct('quiz_id')->count();

        return view('account', compact('user', 'quizCreatedCount', 'quizPlayedCount'));
    }

    public function edit()
    {
        return view('edit-account', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                    function ($attribute, $value, $fail) {
                        $domain = substr(strrchr($value, "@"), 1);
                        if (!in_array($domain, ['edu.esiee-it.fr', 'esiee-it.fr'])) {
                            $fail('L\'adresse email doit être une adresse @edu.esiee-it.fr ou @esiee-it.fr');
                        }
                    },
                ]
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('new_password')) {
                $request->validate([
                    'current_password' => 'required|current_password',
                    'new_password' => 'required|min:8|confirmed',
                ]);
                
                $updateData['password'] = Hash::make($request->new_password);
            }

            $user->update($updateData);

            // Régénérer la session après la mise à jour réussie
            $request->session()->regenerate();

            return redirect()->route('account.show')->with('success', 'Votre profil a été mis à jour avec succès !');

        } catch (\Illuminate\Session\TokenMismatchException $e) {
            return redirect()
                ->back()
                ->withInput($request->except(['password', 'new_password', 'new_password_confirmation']))
                ->with('csrf_error', 'La session a expiré. Veuillez réessayer.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->except(['password', 'new_password', 'new_password_confirmation']))
                ->with('error', 'Une erreur est survenue lors de la mise à jour de votre profil.');
        }
    }
}
