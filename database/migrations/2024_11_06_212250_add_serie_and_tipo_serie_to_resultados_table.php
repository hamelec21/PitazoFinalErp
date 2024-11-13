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

                $table->unsignedBigInteger('serie_id')->nullable();
                $table->unsignedBigInteger('tipo_serie_id')->nullable();

                $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
                $table->foreign('tipo_serie_id')->references('id')->on('tipo_series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resultados', function (Blueprint $table) {
            $table->dropForeign(['serie_id']);
            $table->dropForeign(['tipo_serie_id']);
            $table->dropColumn('serie_id');
            $table->dropColumn('tipo_serie_id');
        });
    }
};
