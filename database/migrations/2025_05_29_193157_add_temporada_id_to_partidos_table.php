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
        Schema::table('partidos', function (Blueprint $table) {
            $table->unsignedBigInteger('temporada_id')->nullable();
            $table->foreign('temporada_id')->references('id')->on('temporadas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partidos', function (Blueprint $table) {

            $table->dropForeign(['temporada_id']);
            $table->dropColumn('temporada_id');
        });
    }
};
