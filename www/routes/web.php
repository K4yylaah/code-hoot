<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('index');
});

Route::get('/challenges', function () {
    return view('challenges');
})->name('challenges');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/verify', [AuthController::class, 'showVerifyOtpForm'])->name('verify.show');
Route::post('/verify', [AuthController::class, 'verifyOtp'])->name('verify.otp');

// Routes protégées par l'authentification
Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'show'])->name('account.show');
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
Route::get('/quiz/play/{quiz}', [QuizController::class, 'play'])->name('game');


Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

Route::get('/result', function () {
    return view('result');
})->name('result');

Route::get('/Mentions-legales', function () {
    return view('Mentions-legales');
})->name('Mentions-legales');

Route::get('/confidentialite', function () {
    return view('confidentialite');
})->name('confidentialite');

Route::get('/cgu', function () {
    return view('cgu');
})->name('cgu');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');