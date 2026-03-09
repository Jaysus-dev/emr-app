<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PatientChartController;

// Redirect root → patient list
Route::get('/', fn () => redirect()->route('patients.index'));

// Patient list routes
Route::get('/patientlist', [PatientListController::class, 'index'])->name('patients.index');
Route::post('/patients', [PatientListController::class, 'store'])->name('patients.store');
Route::put('/patients/{patient}', [PatientListController::class, 'update'])->name('patients.update');
Route::delete('/patients/{patient}/discharge', [PatientListController::class, 'discharge'])->name('patient.discharge');

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