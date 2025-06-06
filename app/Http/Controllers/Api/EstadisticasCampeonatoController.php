<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;

class EstadisticasCampeonatoController extends Controller
{
    public function porSerie($serieId)
    {
        $partidos = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('serie_id', $serieId)
            ->where('tipo_serie_id', 2) // Solo Infantil
            ->get();

        $estadisticas = [];

        foreach ($partidos as $partido) {
            $localId = $partido->club_local_id;
            $visitanteId = $partido->club_visitante_id;

            $golesLocal = $partido->goles_local ?? 0;
            $golesVisitante = $partido->goles_visitante ?? 0;

            // Inicializar equipos si no existen
            foreach ([$localId, $visitanteId] as $clubId) {
                if (!isset($estadisticas[$clubId])) {
                    $club = $partido->clubLocal->id == $clubId ? $partido->clubLocal : $partido->clubVisitante;

                    $estadisticas[$clubId] = [
                        'club_id' => $club->id,
                        'club_nombre' => $club->nombre,
                        'club_logo' => $club->logo ? asset('storage/' . $club->logo) : null,
                        'PJ' => 0,
                        'PG' => 0,
                        'PE' => 0,
                        'PP' => 0,
                        'GF' => 0,
                        'GC' => 0,
                        'DG' => 0,
                        'PT' => 0,
                    ];
                }
            }

            // Actualizar estadísticas
            $estadisticas[$localId]['PJ']++;
            $estadisticas[$visitanteId]['PJ']++;

            $estadisticas[$localId]['GF'] += $golesLocal;
            $estadisticas[$localId]['GC'] += $golesVisitante;

            $estadisticas[$visitanteId]['GF'] += $golesVisitante;
            $estadisticas[$visitanteId]['GC'] += $golesLocal;

            if ($golesLocal > $golesVisitante) {
                $estadisticas[$localId]['PG']++;
                $estadisticas[$localId]['PT'] += 3;

                $estadisticas[$visitanteId]['PP']++;
            } elseif ($golesLocal < $golesVisitante) {
                $estadisticas[$visitanteId]['PG']++;
                $estadisticas[$visitanteId]['PT'] += 3;

                $estadisticas[$localId]['PP']++;
            } else {
                $estadisticas[$localId]['PE']++;
                $estadisticas[$visitanteId]['PE']++;

                $estadisticas[$localId]['PT'] += 1;
                $estadisticas[$visitanteId]['PT'] += 1;
            }
        }

        // Calcular DG (Diferencia de goles)
        foreach ($estadisticas as &$club) {
            $club['DG'] = $club['GF'] - $club['GC'];
        }

        // Ordenar por PT, luego por DG
        $ordenado = collect($estadisticas)->sortByDesc(function ($item) {
            return [$item['PT'], $item['DG']];
        })->values();

        return response()->json([
            'success' => true,
            'data' => $ordenado
        ]);
    }
}
