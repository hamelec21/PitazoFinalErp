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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('contenido'); // Corrección del nombre del campo
            $table->string('slug')->unique(); // Slug debería ser único
            $table->string('imagen')->nullable(); // A veces la imagen puede ser opcional
            $table->date('fecha_publicacion'); // Corrección del nombre del campo
            $table->boolean('is_active')->default(true); // Mejor usar boolean para estado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
