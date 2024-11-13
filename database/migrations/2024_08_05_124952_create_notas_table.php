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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
            $table->unsignedBigInteger('tipo_sancion_id');
            $table->foreign('tipo_sancion_id')->references('id')->on('tipo_sancions')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->unsignedBigInteger('fecha_id');
            $table->foreign('fecha_id')->references('id')->on('fecha_fixtures')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');


            $table->longText('descripcion');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
