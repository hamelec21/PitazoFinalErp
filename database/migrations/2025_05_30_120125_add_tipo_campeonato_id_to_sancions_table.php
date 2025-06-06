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

            $table->unsignedBigInteger('tipo_campeonato_id')->nullable()->after('serie_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sancions', function (Blueprint $table) {
            $table->dropColumn('tipo_campeonato_id');
        });
    }
};
