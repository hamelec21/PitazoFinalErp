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
        Schema::table('sancions', function (Blueprint $table) {

            $table->integer('puntos')->default(0); // puede ser negativo para descontar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sancions', function (Blueprint $table) {
            //
        });
    }
};
