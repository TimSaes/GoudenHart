<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'name',
        'adress',
        'postal_code',
        'hometown',
        'phone_number',
        'email',
        'gender',
        'date_of_birth',
        'particulars',
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
