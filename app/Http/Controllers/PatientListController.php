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
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'photo' => 'nullable|string',
        ]);

        PatientList::create($request->all());
        return redirect()->route('patients.index');
    }
}
