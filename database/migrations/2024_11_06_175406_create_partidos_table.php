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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_local_id')->constrained('clubs');
            $table->foreignId('club_visitante_id')->constrained('clubs');
            $table->foreignId('serie_id')->constrained('series');
            $table->foreignId('tipo_serie_id')->constrained('tipo_series');
            $table->foreignId('fecha_fixture_id')->constrained('fecha_fixtures');
            $table->integer('goles_local');
            $table->integer('goles_visitante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
