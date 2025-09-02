<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpotifyController;

// Halaman welcome/login
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login GET → redirect ke welcome
Route::get('/login', function () {
    return redirect('/');
});

// Login POST → proses login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout (opsional)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Spotify
Route::get('/dashboard', [SpotifyController::class, 'dashboard'])
    ->name('dashboard.index');

Route::get('/postcards/encouragement', function () {
    return view('postcards.encouragement');
});

Route::get('/postcards/love', function () {
    return view('postcards.love');
});

Route::get('/postcards/light', function () {
    return view('postcards.light');
});

Route::get('/postcards/affection', function () {
    return view('postcards.affection');
});
