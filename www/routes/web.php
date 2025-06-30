<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('index');
});

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

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

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
Route::get('/quiz/play/{quiz}', [QuizController::class, 'play'])->name('game');


Route::get('/result', function () {
    return view('result');
})->name('result');
