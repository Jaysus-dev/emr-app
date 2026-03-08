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

        PatientList::create($data);

        return redirect()->route('patients.index');
    }
}