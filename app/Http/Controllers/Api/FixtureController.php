<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    public function porZona($tipoCampeonatoId)
    {
        $fixtures = Fixture::with([
            'tipoCampeonato:id,nombre',
            'serie:id,nombre',
            'clubLocal:id,nombre,logo',
            'clubVisita:id,nombre,logo',
            'fechaFixture:id,fecha'
        ])
            ->where('tipo_campeonato_id', $tipoCampeonatoId)
            ->orderBy('fecha_fixture_id')
            ->get()
            ->map(function ($fixture) {
                return [
                    'id' => $fixture->id,
                    'tipo_campeonato' => $fixture->tipoCampeonato?->nombre,
                    'serie' => $fixture->serie?->nombre,
                    'fecha_fixture' => $fixture->fechaFixture?->fecha,
                    'club_local' => [
                        'id' => $fixture->clubLocal?->id,
                        'nombre' => $fixture->clubLocal?->nombre,
                        'logo' => $fixture->clubLocal?->logo
                            ? asset('storage/' . $fixture->clubLocal->logo)
                            : null,
                    ],
                    'club_visita' => [
                        'id' => $fixture->clubVisita?->id,
                        'nombre' => $fixture->clubVisita?->nombre,
                        'logo' => $fixture->clubVisita?->logo
                            ? asset('storage/' . $fixture->clubVisita->logo)
                            : null,
                    ],
                ];
            });

        return response()->json($fixtures);
    }
}
