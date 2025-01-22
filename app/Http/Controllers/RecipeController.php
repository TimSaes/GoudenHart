<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $recipes = Recipe::all();

            return view('recipes.index', compact('recipes'));
        } catch (\Exception $e) {
            Log::error('Error fetching recipes: '.$e->getMessage());

            return redirect()->back()->with('error', 'Momenteel niet mogelijk om recepten op te halen.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $patients = Patient::all();

            return view('recipes.create', compact('patients'));
        } catch (\Exception $e) {
            Log::error('Error loading recipe creation form: '.$e->getMessage());

            return redirect()->route('recipes.index')->with('error', 'Fout bij het laden van het formulier.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'product' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'instruction' => 'required|string|max:500',
            'repeat' => 'required|string|max:255',
        ]);

        try {
            // Generate a random follow_number
            $followNumber = rand(1, 999999999);

            // Merge the follow_number into the request data
            $data = $request->all();
            $data['follow_number'] = $followNumber;

            Recipe::create($data);

            return redirect()->route('recipes.index')->with('message', 'Recept toegevoegd.');
        } catch (\Exception $e) {
            Log::error('Error creating recipe: '.$e->getMessage());

            return redirect()->back()->with('error', 'Fout bij het aanmaken van recept. Probeer het opnieuw.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $recipe = Recipe::findOrFail($id);
            $patients = Patient::where('id', $id)->get();

            return view('recipes.show', compact('recipe', 'patients'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('recipes.index')->with('error', 'Recept niet gevonden.');
        } catch (\Exception $e) {
            Log::error('Error fetching recipe details: '.$e->getMessage());

            return redirect()->route('recipes.index')->with('error', 'Momenteel niet mogelijk om recept op te halen.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $recipe = Recipe::findOrFail($id);
            $patients = Patient::all();

            return view('recipes.edit', compact('recipe', 'patients'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('recipes.index')->with('error', 'Recept niet gevonden.');
        } catch (\Exception $e) {
            Log::error('Error loading recipe edit form: '.$e->getMessage());

            return redirect()->route('recipes.index')->with('error', 'Fout bij het laden van het formulier.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'product' => 'required|string|max:255',
            'quantity' => 'required|string|max:255',
            'instruction' => 'required|string|max:500',
            'repeat' => 'required|string|max:255',
        ]);

        try {
            $recipe->update($request->all());

            return redirect()->route('recipes.index')->with('message', 'Recept bijgewerkt.');
        } catch (\Exception $e) {
            Log::error('Error updating recipe: '.$e->getMessage());

            return redirect()->back()->with('error', 'Fout bij het bewerken van recept. Probeer het opnieuw.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $recipe = Recipe::findOrFail($id);
            $recipe->delete();

            return redirect()->route('recipes.index')->with('message', 'Recept succesvol verwijderd.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('recipes.index')->with('error', 'Recept niet gevonden.');
        } catch (\Exception $e) {
            Log::error('Error deleting patient: '.$e->getMessage());

            return redirect()->route('recipes.index')->with('error', 'Fout bij het verwijderen van recept. Probeer het opnieuw.');
        }
    }
}
