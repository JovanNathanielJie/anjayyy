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

// Dashboard Spotify Top 3
Route::get('/dashboard', [SpotifyController::class, 'showTop3'])->name('dashboard.index');
