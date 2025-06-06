<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Models\Sancion;

class CampeonatoSub45Controller extends Controller
{
    /**
     * Tabla general de la serie Sub-45 (sin importar zona)
     */
    public function tablaGeneralSub45()
    {
        $tipoSerieId = 1; // Sub-45
        $tipoCampeonatoId = 1; // Regular

        $partidosSub45 = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('tipo_serie_id', $tipoSerieId)
            ->where('tipo_campeonato_id', $tipoCampeonatoId)
            ->get();

        $estadisticas = $this->calcularEstadisticas($partidosSub45, $tipoSerieId, $tipoCampeonatoId);

        return response()->json([
            'success' => true,
            'data' => $estadisticas->sortByDesc(fn($item) => [$item['PT'], $item['DG']])->values(),
        ]);
    }

    /**
     * Calcula estadísticas para una colección de partidos.
     *
     * @param \Illuminate\Support\Collection $partidos
     * @param int $tipoSerieId
     * @param int $tipoCampeonatoId
     * @return \Illuminate\Support\Collection
     */
    private function calcularEstadisticas($partidos, $tipoSerieId, $tipoCampeonatoId)
    {
        $estadisticas = [];
        $clubSeries = []; // [club_id => [serie_ids]]

        foreach ($partidos as $partido) {
            $localId = $partido->club_local_id;
            $visitanteId = $partido->club_visitante_id;
            $serieId = $partido->serie_id;

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
                    $clubSeries[$clubId] = [];
                }

                // Registrar series jugadas por cada club
                if (!in_array($serieId, $clubSeries[$clubId])) {
                    $clubSeries[$clubId][] = $serieId;
                }
            }

            $estadisticas[$localId]['PJ']++;
            $estadisticas[$visitanteId]['PJ']++;

            $estadisticas[$localId]['GF'] += $golesLocal;
            $estadisticas[$localId]['GC'] += $golesVisitante;

            $estadisticas[$visitanteId]['GF'] += $golesVisitante;
            $estadisticas[$visitanteId]['GC'] += $golesLocal;

            // Puntaje estándar
            $puntosGanador = 3;

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

        // Aplicar sanciones por club_id, tipo_serie_id, serie_id y tipo_campeonato_id
        foreach ($estadisticas as &$club) {
            $clubId = $club['club_id'];

            // Sanciones que afecten al club en cualquiera de las series que jugó
            $sanciones = Sancion::where('club_id', $clubId)
                ->where('tipo_serie_id', $tipoSerieId)
                ->whereIn('serie_id', $clubSeries[$clubId])
                ->where('tipo_campeonato_id', $tipoCampeonatoId)
                ->get();

            $puntosExtra = $sanciones->sum('puntos');
            $club['PT'] += $puntosExtra;
            $club['total_puntos'] = $club['PT'];
            $club['DG'] = $club['GF'] - $club['GC'];
        }

        return collect($estadisticas)->values();
    }
}
