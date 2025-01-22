<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipesData = [
            [
                'patient_id' => 1,
                'product' => 'Xylometazoline',
                'quantity' => '2',
                'instruction' => '2 maal dagelijks 1 spray in elk neusgat',
                'repeat' => 'Ja',
            ],
            [
                'patient_id' => 2,
                'product' => 'Paracetamol',
                'quantity' => '40',
                'instruction' => '2 tabletten per inname, maximaal 6 per dag',
                'repeat' => 'Nee',
            ],
            [
                'patient_id' => 3,
                'product' => 'Bepanthen',
                'quantity' => '1',
                'instruction' => '2 maal dagelijks wond insmeren en laten intrekken voor 10 minuten',
                'repeat' => 'Ja',
            ],
        ];

        foreach ($recipesData as $recipeData) {
            Recipe::create([
                'follow_number' => rand(1, 999999999), // Generate a random follow number
                'patient_id' => $recipeData['patient_id'],
                'product' => $recipeData['product'],
                'quantity' => $recipeData['quantity'],
                'instruction' => $recipeData['instruction'],
                'repeat' => $recipeData['repeat'],
            ]);
        }
    }
}
