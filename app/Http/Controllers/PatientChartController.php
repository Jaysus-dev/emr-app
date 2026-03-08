<?php

namespace App\Http\Controllers;

use App\Models\PatientList; // ← Use your PatientList model
use Inertia\Inertia;
use Illuminate\Http\Request;

class PatientChartController extends Controller
{
    public function info(PatientList $patient)
    {
        return Inertia::render('patient/Info', [
            'patient' => $patient,
        ]);
    }

    public function clinicalNotes(PatientList $patient)
    {
        return Inertia::render('patient/ClinicalNotes', [
            'patient' => $patient,
        ]);
    }

    public function vitalSigns(PatientList $patient)
    {
        return Inertia::render('patient/VitalSigns', [
            'patient' => $patient,
        ]);
    }

    public function plan(PatientList $patient)
    {
        return Inertia::render('patient/Plan', [
            'patient' => $patient,
        ]);
    }

    public function diet(PatientList $patient)
    {
        return Inertia::render('patient/Diet', [
            'patient' => $patient,
        ]);
    }

    public function diagnosis(PatientList $patient)
    {
        return Inertia::render('patient/Diagnosis', [
            'patient' => $patient,
        ]);
    }

    public function abstract(PatientList $patient)
    {
        return Inertia::render('patient/Abstract', [
            'patient' => $patient,
        ]);
    }

    public function documents(PatientList $patient)
    {
        return Inertia::render('patient/Documents', [
            'patient' => $patient,
        ]);
    }
}