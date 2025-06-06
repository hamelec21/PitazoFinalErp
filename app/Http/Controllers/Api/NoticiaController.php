<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    // Mostrar todas las noticias activas con URL completa de imagen
    public function index()
    {
        $noticias = Noticia::where('is_active', '1')
            ->orderByDesc('fecha_publicacion')
            ->get(['id', 'titulo', 'contenido', 'slug', 'imagen', 'fecha_publicacion', 'is_active'])
            ->map(function ($noticia) {
                return [
                    'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'slug' => $noticia->slug,
                    'contenido' => strip_tags($noticia->contenido),
                    'imagen' => $noticia->imagen ? asset('storage/' . $noticia->imagen) : null,
                    'fecha_publicacion' => $noticia->fecha_publicacion->toDateString(),
                    'is_active' => $noticia->is_active,
                ];
            });

        return response()->json($noticias);
    }

    // Mostrar últimas 5 noticias activas con URL completa de imagen
    public function ultimas()
    {
        $noticias = Noticia::where('is_active', '1')
            ->orderByDesc('fecha_publicacion')
            ->limit(3)
            ->get(['id', 'titulo', 'contenido', 'slug', 'imagen', 'fecha_publicacion', 'is_active'])
            ->map(function ($noticia) {
                return [
                    'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'slug' => $noticia->slug,
                    'contenido' => strip_tags($noticia->contenido),
                    'imagen' => $noticia->imagen ? asset('storage/' . $noticia->imagen) : null,
                    'fecha_publicacion' => $noticia->fecha_publicacion->toDateString(),
                    'is_active' => $noticia->is_active,
                ];
            });

        return response()->json($noticias);
    }



    // Mostrar detalle por slug con URL completa de imagen
    public function porSlug($slug)
    {
        $noticia = Noticia::where('slug', $slug)
            ->where('is_active', '1')
            ->firstOrFail();

        return response()->json([
            'id' => $noticia->id,
            'titulo' => $noticia->titulo,
            'slug' => $noticia->slug,
            'contenido' => strip_tags($noticia->contenido),
            'imagen' => $noticia->imagen ? asset('storage/' . $noticia->imagen) : null,
            'fecha_publicacion' => $noticia->fecha_publicacion->toDateString(),
            'is_active' => $noticia->is_active,
        ]);
    }
}
