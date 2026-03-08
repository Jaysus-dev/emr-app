<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthController; 
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PatientChartController;

// Redirect root → login
Route::get('/', fn () => redirect('/login'));

// Login routes
Route::get('/login', fn () => Inertia::render('auth/Login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', function () {
    Auth::logout(); 
    return redirect()->route('login'); 
})->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {

    // Patient list
    Route::get('/patientlist', [PatientListController::class, 'index'])->name('patients.index');
    Route::post('/patients', [PatientListController::class, 'store'])->name('patients.store');
    Route::put('/patients/{patient}', [PatientListController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{patient}/discharge', [PatientListController::class, 'discharge']) -> name('patient.discharge');
    // Patient chart routes
    Route::prefix('patientchart')->name('patientchart.')->group(function () {
        Route::get('/', fn () => redirect()->route('patientchart.info'))->name('index');
        Route::get('info/{patient}', [PatientChartController::class, 'info'])->name('info');
        Route::get('clinical-notes/{patient}', [PatientChartController::class, 'clinicalNotes'])->name('clinical-notes');
        Route::get('vital-signs/{patient}', [PatientChartController::class, 'vitalSigns'])->name('vital-signs');
        Route::get('plan/{patient}', [PatientChartController::class, 'plan'])->name('plan');
        Route::get('diet/{patient}', [PatientChartController::class, 'diet'])->name('diet');
        Route::get('diagnosis/{patient}', [PatientChartController::class, 'diagnosis'])->name('diagnosis');
        Route::get('abstract/{patient}', [PatientChartController::class, 'abstract'])->name('abstract');
        Route::get('documents/{patient}', [PatientChartController::class, 'documents'])->name('documents');
    });

});