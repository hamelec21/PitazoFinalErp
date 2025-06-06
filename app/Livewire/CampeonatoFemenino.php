<?php

namespace App\Livewire;

<<<<<<< HEAD

=======
use App\Models\Resultado;
use Illuminate\Support\Facades\DB;
>>>>>>> 9ed20951d27992a39ce8f0545525175b0a6d8696
use Livewire\Component;
use App\Models\Partido;
use App\Models\Sancion;
use Illuminate\Support\Collection;

class CampeonatoFemenino extends Component
{
    public $estadisticas;

    public function mount()
    {
        $this->estadisticas = $this->obtenerEstadisticas();
    }



    private function obtenerEstadisticas()
    {
        $campeonatoRegular = 1;
        $tipoSerieId = 3; // Damas

        $partidosDamas = Partido::with(['clubLocal', 'clubVisitante'])
            ->where('tipo_serie_id', $tipoSerieId)
            ->where('tipo_campeonato_id', $campeonatoRegular)
            ->get();

        return $this->calcularEstadisticas($partidosDamas, true, $tipoSerieId)
            ->sortByDesc(fn($item) => [$item['PT'], $item['DG']])
            ->values();
    }

    private function calcularEstadisticas($partidos, $usarPuntajeSerieEspecial = false, $tipoSerieId = null)
    {
        $estadisticas = [];

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

        foreach ($estadisticas as &$club) {
            $sanciones = Sancion::where('club_id', $club['club_id'])
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
        });
    }




    public function render()
    {
<<<<<<< HEAD
        return view('livewire.campeonato-femenino', [
            'resultados' => $this->estadisticas
        ]);
=======

        $femeninas = Resultado::with('clubnombre')
        ->where('tipo_serie_id', 3)
        ->where('serie_id', 6)
        ->select(
            'club_id',
            DB::raw('SUM(puntos) as total_puntos'),
            DB::raw('SUM(goles_local) as goles_a_favor'),
            DB::raw('SUM(goles_visitante) as goles_en_contra'),
            DB::raw('COUNT(*) as partidos_jugados'),
            DB::raw('SUM(CASE WHEN puntos = 3 THEN 1 ELSE 0 END) as partidos_ganados'),
            DB::raw('SUM(CASE WHEN puntos = 0 THEN 1 ELSE 0 END) as partidos_perdidos'),
            DB::raw('SUM(CASE WHEN puntos = 1 THEN 1 ELSE 0 END) as partidos_empatados')
        )
        ->groupBy('club_id')
        ->orderBy('total_puntos', 'desc')
        ->get();



        return view('livewire.campeonato-femenino',compact('femeninas'));
>>>>>>> 9ed20951d27992a39ce8f0545525175b0a6d8696
    }
}
