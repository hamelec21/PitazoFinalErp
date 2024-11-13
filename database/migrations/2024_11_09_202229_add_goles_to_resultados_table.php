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
        Schema::table('resultados', function (Blueprint $table) {
            $table->integer('goles_local')->default(0);   // Columna para goles del equipo local
            $table->integer('goles_visitante')->default(0); // Columna para goles del equipo visitante
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resultados', function (Blueprint $table) {
            $table->dropColumn(['goles_local', 'goles_visitante']);
        });
    }
};
