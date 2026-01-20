<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
class PatientChartController extends Controller
{
    public function info()
    {
        return Inertia::render('patient/Info');
    }

    public function clinicalNotes()
    {
        return Inertia::render('patient/ClinicalNotes');
    }

    public function vitalSigns()
    {
        return Inertia::render('patient/VitalSigns');
    }

    public function plan()
    {
        return Inertia::render('patient/Plan');
    }

    public function diet()
    {
        return Inertia::render('patient/Diet');
    }

    public function diagnosis()
    {
        return Inertia::render('patient/Diagnosis');
    }

    public function abstract()
    {
        return Inertia::render('patient/Abstract');
    }

    public function documents()
    {
        return Inertia::render('patient/Documents');
    }
}
