<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pointages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_salarier');
            $table->foreign('id_salarier')->references('id')->on('salariers')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->string('presentAbsent');
            $table->time('heureSupp', 0)->nullable(); // Modifier la colonne avec une précision de 0 pour les secondes
            $table->time('heureMoin')->nullable();
            $table->integer('avance')->nullable();
            $table->integer('montantAjouter')->nullable();
            $table->string('remarque')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pointages');
    }
};