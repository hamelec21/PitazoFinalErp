<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticias';

    protected $fillable = [
        'titulo',
        'contenido',
        'slug',
        'imagen',
        'fecha_publicacion',
        'is_active',
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
        'is_active' => 'boolean',
    ];

    // Accessor para generar extracto del contenido
    public function getExtractoAttribute()
    {
        return Str::limit(strip_tags($this->contenido), 150);
    }

    // Accessor para mostrar la URL de la imagen (si usas almacenamiento)
    public function getImagenUrlAttribute()
    {
        return $this->imagen
            ? asset('storage/' . $this->imagen)
            : asset('images/default.jpg'); // Imagen por defecto si no hay
    }

    protected static function booted()
    {
        static::creating(function ($noticia) {
            $noticia->slug = Str::slug($noticia->titulo);
        });

        static::updating(function ($noticia) {
            // Solo actualizar el slug si cambió el título
            if ($noticia->isDirty('titulo')) {
                $noticia->slug = Str::slug($noticia->titulo);
            }
        });
    }
}
