<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salariers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('tel');
            $table->string('adresse');
            $table->string('salaire');
            $table->string('sexe');
            $table->date("dateEntree");
            $table->string("active");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salariers');
    }
};