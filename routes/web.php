<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Redirect root URL to /login (optional)
Route::get('/', fn () => redirect('/login'));

// Login page URL
Route::get('/login', fn () => Inertia::render('Auth/Login'))->name('login');

// FAKE login submit (no auth yet)
Route::post('/login', function () {
    // Pretend login is successful
    return redirect()->route('dashboard');
})->name('login.submit');

// Dashboard page
Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');
