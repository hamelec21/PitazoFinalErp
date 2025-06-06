<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Models\Sancion;
use Illuminate\Support\Facades\DB;

class CampeonatoInfantilController extends Controller
{
    public function porSerie($serieId)
    {
        $tipoSerieId = 2; // Infantil

        $partidos = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('serie_id', $serieId)
            ->where('tipo_serie_id', $tipoSerieId)
            ->get();

        // Obtener tipo_campeonato_id desde el primer partido (si existe)
        $tipoCampeonatoId = optional($partidos->first())->tipo_campeonato_id;

        $estadisticas = [];

        foreach ($partidos as $partido) {
            $localId = $partido->club_local_id;
            $visitanteId = $partido->club_visitante_id;

            $golesLocal = $partido->goles_local ?? 0;
            $golesVisitante = $partido->goles_visitante ?? 0;

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

        // Aplicar sanciones por club_id, tipo_serie_id, serie_id y tipo_campeonato_id
        foreach ($estadisticas as &$club) {
            $sanciones = Sancion::where('club_id', $club['club_id'])
                ->when($tipoSerieId !== null, fn($q) => $q->where('tipo_serie_id', $tipoSerieId))
                ->when($serieId !== null, fn($q) => $q->where('serie_id', $serieId))
                ->when($tipoCampeonatoId !== null, fn($q) => $q->where('tipo_campeonato_id', $tipoCampeonatoId))
                ->get();

            $puntosExtra = $sanciones->sum('puntos');
            $club['PT'] += $puntosExtra;
            $club['total_puntos'] = $club['PT'];
        }

        // Calcular diferencia de goles
        $ordenado = collect($estadisticas)->map(function ($club) {
            $club['DG'] = $club['GF'] - $club['GC'];
            return $club;
        })->sortByDesc(function ($item) {
            return [$item['PT'], $item['DG']];
        })->values();

        return response()->json([
            'success' => true,
            'data' => $ordenado,
        ]);
    }
}
