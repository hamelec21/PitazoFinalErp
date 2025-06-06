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

            $table->unsignedBigInteger('serie_id')->nullable()->after('fecha_id');
            $table->unsignedBigInteger('tipo_serie_id')->nullable()->after('serie_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sancions', function (Blueprint $table) {

            $table->dropColumn('serie_id');
            $table->dropColumn('tipo_serie_id');
        });
    }
};
