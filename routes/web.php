<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('patients.index');
// });

Route::resource('patients', PatientController::class);
Route::resource('recipes', RecipeController::class);
