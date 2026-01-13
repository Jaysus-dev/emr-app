<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// Settings page
Route::get('/settings', fn () => Inertia::render('Settings'))->name('settings');

// Logout 
Route::post('/logout', function () {
    Auth::logout(); // logs out the user
    return redirect()->route('login'); // redirect to login page
})->name('logout');
