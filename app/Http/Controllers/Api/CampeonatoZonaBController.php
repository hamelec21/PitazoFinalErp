<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Models\Sancion;
use Illuminate\Http\Request;

class CampeonatoZonaBController extends Controller
{public function tablaGeneralAdultos(Request $request)
    {
        $zonaB = 3;

        // Adultos en Zona A (tipo_serie_id = 1)
        $partidosAdultos = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('tipo_serie_id', 1)
            ->where('tipo_campeonato_id', $zonaB)
            ->get();

        // Damas fuera de Zona B (tipo_serie_id = 3)
        $partidosDamas = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('tipo_serie_id', 3)
            ->where('tipo_campeonato_id', '!=', $zonaB)
            ->get();

        $estadisticasAdultos = $this->calcularEstadisticas($partidosAdultos, false);
        $estadisticasDamas = $this->calcularEstadisticas($partidosDamas, true);

        // Sumar damas si el club también está en Adultos Zona B
        foreach ($estadisticasDamas as $damasClub) {
            $clubId = $damasClub['club_id'];
            $club = $estadisticasAdultos->firstWhere('club_id', $clubId);

            if ($club) {
                foreach (['PJ', 'PG', 'PE', 'PP', 'GF', 'GC', 'PT'] as $campo) {
                    $club[$campo] += $damasClub[$campo];
                }
                $club['DG'] = $club['GF'] - $club['GC'];

                // Reemplazar club actualizado
                $estadisticasAdultos = $estadisticasAdultos->map(function ($item) use ($club) {
                    return $item['club_id'] === $club['club_id'] ? $club : $item;
                });
            }
        }

        $estadisticasTransformadas = $this->transformarEstadisticas($estadisticasAdultos);

        return response()->json([
            'success' => true,
            'data' => $estadisticasTransformadas->sortByDesc(fn($item) => [$item['total_puntos'], $item['diferencia_goles']])->values(),
        ]);
    }

    public function porSerie($serieId)
    {
        $zonaB = 3;

        $partidos = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('serie_id', $serieId)
            ->where('tipo_campeonato_id', $zonaB)
            ->get();

        $usarPuntajeEspecial = $serieId == 3;

        $estadisticas = $this->calcularEstadisticas($partidos, $usarPuntajeEspecial);

        $estadisticasTransformadas = $this->transformarEstadisticas($estadisticas);

        return response()->json([
            'success' => true,
            'data' => $estadisticasTransformadas->sortByDesc(fn($item) => [$item['total_puntos'], $item['diferencia_goles']])->values(),
        ]);
    }

    private function calcularEstadisticas($partidos, $usarPuntajeSerieEspecial = false)
    {
        $estadisticas = [];

        foreach ($partidos as $partido) {
            $localId = $partido->club_local_id;
            $visitanteId = $partido->club_visitante_id;
            $serieId = $partido->tipo_serie_id; // <- CORREGIDO

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

            $puntosGanador = ($usarPuntajeSerieEspecial && $serieId == 3) ? 3 : 3;

            if ($golesLocal > $golesVisitante) {
                $estadisticas[$localId]['PG']++;
                $estadisticas[$localId]['PT'] += $puntosGanador;

                $estadisticas[$visitanteId]['PP']++;
            } elseif ($golesLocal < $golesVisitante) {
                $estadisticas[$visitanteId]['PG']++;
                $estadisticas[$visitanteId]['PT'] += $puntosGanador;

                $estadisticas[$localId]['PP']++;
            } else {
                $estadisticas[$localId]['PE']++;
                $estadisticas[$visitanteId]['PE']++;

                $estadisticas[$localId]['PT'] += 1;
                $estadisticas[$visitanteId]['PT'] += 1;
            }
        }

        foreach ($estadisticas as &$club) {
            $club['DG'] = $club['GF'] - $club['GC'];
        }

        return collect($estadisticas)->values();
    }

    private function transformarEstadisticas($estadisticas)
    {
        return $estadisticas->map(function ($item) {
            // Obtener sanciones de adultos y damas del club
            $sanciones = Sancion::where('club_id', $item['club_id'])
                ->whereIn('tipo_serie_id', [1, 3]) // Adultos y Damas
                ->get();

            $puntosExtra = $sanciones->sum('puntos');
            $puntosFinal = $item['PT'] + $puntosExtra;

            return [
                'club_id' => $item['club_id'],
                'club_nombre' => $item['club_nombre'],
                'club_logo' => $item['club_logo'],
                'total_puntos' => $puntosFinal,
                'goles_a_favor' => $item['GF'],
                'goles_en_contra' => $item['GC'],
                'partidos_jugados' => $item['PJ'],
                'partidos_ganados' => $item['PG'],
                'partidos_empatados' => $item['PE'],
                'partidos_perdidos' => $item['PP'],
                'diferencia_goles' => $item['DG'],
            ];
        });
    }
}
