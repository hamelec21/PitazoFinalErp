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
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_campeonato_id')->constrained('tipo_campeonatos');
            $table->foreignId('serie_id')->constrained('series');
            $table->foreignId('club_local_id')->constrained('clubs');
            $table->foreignId('club_visita_id')->constrained('clubs');
            $table->foreignId('fecha_fixture_id')->constrained('fecha_fixtures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
