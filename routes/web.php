<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\PatientChartController;

// Redirect root URL to /login (optional)
Route::get('/', fn () => redirect('/login'));

// Login page URL
Route::get('/login', fn () => Inertia::render('auth/Login'))->name('login');

// FAKE login submit (no auth yet)
Route::post('/login', function () {
    // Pretend login is successful
    return redirect()->route('dashboard');
})->name('login.submit');

// Dashboard page
Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');
// Settings page

Route::get('/settings', function () {
    return redirect()->route('settings.profile');
}); 
//Route::get('/settings', fn () => Inertia::render('layouts/SettingsLayout'))->name('settings');
//Settings content
Route::prefix('settings')->name('settings.')->group(function() {
    Route::get('profile',fn () => Inertia::render('settings/Profile'))->name('profile');
    Route::get('appeareance',fn () => Inertia::render('settings/Appearance'))->name('appearance');
    Route::get('newsupload',fn () => Inertia::render('settings/NewsUpload'))->name('newsupload');
});
Route::prefix('patientchart')->name('patientchart.')->group(function () {
      // Redirect index → /info
    Route::get('/', fn () => redirect()->route('patientchart.info'))->name('index');
    //Route::get('/', [PatientChartController::class, 'info'])->name('index');
    Route::get('info', [PatientChartController::class, 'info'])->name('info');
    Route::get('clinical-notes', [PatientChartController::class, 'clinicalNotes'])->name('clinical-notes');
    Route::get('vital-signs', [PatientChartController::class, 'vitalSigns'])->name('vital-signs');
    Route::get('plan', [PatientChartController::class, 'plan'])->name('plan');
    Route::get('diet', [PatientChartController::class, 'diet'])->name('diet');
    Route::get('diagnosis', [PatientChartController::class, 'diagnosis'])->name('diagnosis');
    Route::get('abstract', [PatientChartController::class, 'abstract'])->name('abstract');
    Route::get('documents', [PatientChartController::class, 'documents'])->name('documents');
});
// Logout 
Route::post('/logout', function () {
    Auth::logout(); // logs out the user
    return redirect()->route('login'); // redirect to login page
})->name('logout');
