<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use Illuminate\Http\Request;

class CampeonatoFemeninoController extends Controller
{
    /**
     * Tabla general de la serie femenina (sin importar zona)
     */
    public function tablaGeneralDamas()
    {
        $campeonatoRegular = 1; // tipo_campeonato_id = 1 (Regular)

        // Partidos de damas solo en campeonato regular
        $partidosDamas = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('tipo_serie_id', 3) // Damas
            ->where('tipo_campeonato_id', $campeonatoRegular)
            ->get();

        // Calcular estadísticas con puntaje especial
        $estadisticas = $this->calcularEstadisticas($partidosDamas, true, 3); //se agrgra el 3

        return response()->json([
            'success' => true,
            'data' => $estadisticas->sortByDesc(fn($item) => [$item['PT'], $item['DG']])->values(),
        ]);
    }


    /**
     * Calcula estadísticas para una colección de partidos.
     *
     * @param \Illuminate\Support\Collection $partidos
     * @param bool $usarPuntajeSerieEspecial
     * @return \Illuminate\Support\Collection
     */
    private function calcularEstadisticas($partidos, $usarPuntajeSerieEspecial = false, $tipoSerieId = null)
    {
        $estadisticas = [];

        // Obtener el tipo_campeonato_id desde el primer partido (si existe)
        $tipoCampeonatoId = optional($partidos->first())->tipo_campeonato_id;

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

        // Aplicar sanciones por club_id, tipo_serie_id, serie_id y tipo_campeonato_id
        foreach ($estadisticas as &$club) {
            $sanciones = \App\Models\Sancion::where('club_id', $club['club_id'])
                ->when($tipoSerieId !== null, fn($q) => $q->where('tipo_serie_id', $tipoSerieId))
                ->when(isset($serieId), fn($q) => $q->where('serie_id', $serieId))
                ->when($tipoCampeonatoId !== null, fn($q) => $q->where('tipo_campeonato_id', $tipoCampeonatoId))
                ->get();

            $puntosExtra = $sanciones->sum('puntos');
            $club['PT'] += $puntosExtra;
            $club['total_puntos'] = $club['PT'];
        }

        return collect($estadisticas)->map(function ($club) {
            $club['DG'] = $club['GF'] - $club['GC'];
            return $club;
        })->values();
    }
}
