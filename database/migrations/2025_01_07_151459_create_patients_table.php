<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255)->required();
            $table->string('adress', 255)->required();
            $table->string('postal_code', 255)->required();
            $table->string('hometown', 255)->required();
            $table->string('phone_number', 20)->required()->unique();
            $table->string('email', 255)->required()->unique();
            $table->string('gender', 255)->required();
            $table->date('date_of_birth')->required();
            $table->string('particulars', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
