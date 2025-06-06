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
            $table->foreignId('tipo_campeonato_id')
                ->nullable() // Opcional: útil si ya existen registros
                ->constrained('tipo_campeonatos')
                ->after('fecha_fixture'); // Ajusta según el orden deseado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resultados', function (Blueprint $table) {
            $table->dropForeign(['tipo_campeonato_id']);
            $table->dropColumn('tipo_campeonato_id');
        });
    }
};
