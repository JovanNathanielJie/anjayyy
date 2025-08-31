<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpotifyController;

// Halaman welcome/login
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login POST
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard Spotify → beri nama route yang sesuai
Route::get('/dashboard', [SpotifyController::class, 'dashboard'])
    ->name('dashboard.index'); // <-- harus sama dengan redirect di AuthController

