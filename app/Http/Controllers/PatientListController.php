<?php

namespace App\Http\Controllers;
use App\Models\PatientList;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
    public function index()
    {
        $patients = PatientList::all(); 
        return Inertia::render('patient/PatientList', [
            'patients' => $patients
        ]);
    }
}
