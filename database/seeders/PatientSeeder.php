<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patientsData = [
            [
                'name' => 'Tim Saes',
                'adress' => 'Sterrenlaan 10',
                'postal_code' => '5631 KA',
                'hometown' => 'Eindhoven',
                'phone_number' => '0612345678',
                'email' => 'ps172191@edu.summacollege.nl',
                'gender' => 'Man',
                'date_of_birth' => '2000-06-20',
                'particulars' => '',
            ],
            [
                'name' => 'Rik Brandenburg',
                'adress' => 'Sterrenlaan 12',
                'postal_code' => '5631 KA',
                'hometown' => 'Eindhoven',
                'phone_number' => '0612345679',
                'email' => 'ps205590@edu.summacollege.nl',
                'gender' => 'Man',
                'date_of_birth' => '1997-10-17',
                'particulars' => '',
            ],
            [
                'name' => 'Kevin Blommers',
                'adress' => 'Sterrenlaan 14',
                'postal_code' => '5631 KA',
                'hometown' => 'Eindhoven',
                'phone_number' => '0612345671',
                'email' => 'ps179820@edu.summacollege.nl',
                'gender' => 'Man',
                'date_of_birth' => '2004-11-17',
                'particulars' => 'Dyslexie',
            ],
        ];

        foreach ($patientsData as $patientData) {
            Patient::create([
                'name' => $patientData['name'],
                'adress' => $patientData['adress'],
                'postal_code' => $patientData['postal_code'],
                'hometown' => $patientData['hometown'],
                'phone_number' => $patientData['phone_number'],
                'email' => $patientData['email'],
                'gender' => $patientData['gender'],
                'date_of_birth' => $patientData['date_of_birth'],
                'particulars' => $patientData['particulars'],
            ]);
        }
    }
}
