<?php

namespace App\Http\Controllers;

use App\Models\PatientList;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientListController extends Controller
{
    public function index()
    {
        $patients = PatientList::all(); 
        return Inertia::render('patient/PatientList', [
            'patients' => $patients
        ]);
    }

    // Admit new patient
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|in:M,F',
            'dob' => 'required|date',
            'dx' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('patients', 'public');
        }

        $data['status'] = 'Admitted';
        $patient = PatientList::create($data);
        
    }

    // Update patient (partial updates allowed)
    public function update(Request $request, PatientList $patient)
    {
        $data = $request->validate([
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'gender' => 'sometimes|in:M,F',
            'dob' => 'sometimes|date',
            'dx' => 'sometimes|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($patient->photo) {
                Storage::disk('public')->delete($patient->photo);
            }
            $data['photo'] = $request->file('photo')->store('patients', 'public');
        }

        $patient->update($data);
       
        // Update

    }

    // Discharge patient
    public function discharge(PatientList $patient)
    {
        $patient->delete();
        
    }
}