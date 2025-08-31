<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpotifyController;

// Login POST
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', function () {
    return view('welcome'); // atau view login kamu
});

// Halaman welcome/login
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Top 3 Spotify
Route::get('/dashboard', function () {
    return view('dashboard.index'); // file resources/views/dashboard/index.blade.php
})->name('dashboard.index');
