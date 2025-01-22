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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('follow_number')->required()->unique();
            $table->unsignedBigInteger('patient_id')->required();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('product', 255)->required();
            $table->string('quantity', 255)->required();
            $table->string('instruction', 500)->required();
            $table->string('repeat', 255)->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe');
    }
};
