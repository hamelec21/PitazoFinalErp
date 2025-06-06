<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class LogoClubController extends Controller
{
    public function index(): JsonResponse
    {
        $clubes = Club::where('nombre', '!=', 'Libre') // 👈 Excluye club con nombre "Libre"
            ->orderBy('nombre', 'asc')
            ->limit(15)
            ->get(['id', 'nombre', 'logo'])
            ->map(function ($club) {
                return [
                    'id' => $club->id,
                    'nombre' => $club->nombre,
                    'logo' => $club->logo
                        ? asset('storage/' . $club->logo)
                        : null,
                ];
            });
        return response()->json($clubes);
    }
}
