<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpotifyController;

// Halaman welcome/login
Route::get('/', function () {
    return view('welcome');
});


// Login POST
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/playlist', [SpotifyController::class, 'playlist']);
Route::get('/dashboard', [SpotifyController::class, 'dashboard']);

