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
        Schema::create('sancions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->unsignedBigInteger('fecha_id');
            $table->foreign('fecha_id')->references('id')->on('fecha_fixtures')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
            $table->string('nombre');
            $table->longText('sancion');









            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sancions');
    }
};
