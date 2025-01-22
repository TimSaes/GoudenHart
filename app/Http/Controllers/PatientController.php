<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $patients = Patient::all();

            return view('patients.index', compact('patients'));
        } catch (\Exception $e) {
            Log::error('Error fetching patients: '.$e->getMessage());

            return redirect()->back()->with('error', 'Momenteel niet mogelijk om patiënten op te halen.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('patients.create');
        } catch (\Exception $e) {
            Log::error('Error loading patient creation form: '.$e->getMessage());

            return redirect()->route('patients.index')->with('error', 'Fout bij het laden van het formulier.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'hometown' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:patients',
            'email' => 'required|string|email|max:255|unique:patients',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'particulars' => 'nullable|string|max:500',
            'product' => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:255',
            'instruction' => 'nullable|string|max:500',
            'repeat' => 'nullable|string|max:255',
        ]);

        try {
            $patient = Patient::create($validatedData);

            if ($request->filled(['product', 'quantity', 'instruction', 'repeat'])) {
                $recipeData = $request->only(['product', 'quantity', 'instruction', 'repeat']);
                $recipeData['patient_id'] = $patient->id;
                $recipeData['follow_number'] = rand(1, 999999999); // Generate a random follow number

                Recipe::create($recipeData);
            }

            return redirect()->route('patients.index')->with('message', 'Patiënt toegevoegd.');
        } catch (\Exception $e) {
            Log::error('Error creating patient and recipe: '.$e->getMessage());

            return redirect()->back()->with('error', 'Fout bij het aanmaken van patiënt en/of recept. Probeer het opnieuw.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $recipes = Recipe::where('patient_id', $id)->get();

            return view('patients.show', compact('patient', 'recipes'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('patients.index')->with('error', 'Patiënt niet gevonden.');
        } catch (\Exception $e) {
            Log::error('Error fetching patient details: '.$e->getMessage());

            return redirect()->route('patients.index')->with('error', 'Momenteel niet mogelijk om patiëntgegevens op te halen.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $patient = Patient::findOrFail($id);

            return view('patients.edit', compact('patient'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('patients.index')->with('error', 'Patiënt niet gevonden.');
        } catch (\Exception $e) {
            Log::error('Error loading patient edit form: '.$e->getMessage());

            return redirect()->route('patients.index')->with('error', 'Fout bij het laden van het formulier.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'hometown' => 'required|string|max:255',
            'phone_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('patients')->ignore($patient->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('patients')->ignore($patient->id),
            ],
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'particulars' => 'nullable|string|max:500',
        ]);

        try {
            $patient->update($request->all());

            return redirect()->route('patients.index')->with('message', 'Patiënt bijgewerkt.');
        } catch (\Exception $e) {
            Log::error('Error updating patient: '.$e->getMessage());

            return redirect()->back()->with('error', 'Fout bij het bewerken van patiënt. Probeer het opnieuw.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->delete();

            return redirect()->route('patients.index')->with('message', 'Patiënt succesvol verwijderd.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('patients.index')->with('error', 'Patiënt niet gevonden.');
        } catch (\Exception $e) {
            Log::error('Error deleting patient: '.$e->getMessage());

            return redirect()->route('patients.index')->with('error', 'Fout bij het verwijderen van patiënt. Probeer het opnieuw.');
        }
    }
}
