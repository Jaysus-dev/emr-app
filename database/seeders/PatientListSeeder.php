<?php

namespace Database\Seeders;

use App\Models\PatientList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientListSeeder extends Seeder
{
    public function run(): void
    {
        PatientList::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'Male',
            'dob' => '1990-01-01',
            'photo' => 'https://via.placeholder.com/50',
        ]);

        PatientList::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'gender' => 'Female',
            'dob' => '1985-05-10',
            'photo' => 'https://via.placeholder.com/50',
        ]);
    }
}
