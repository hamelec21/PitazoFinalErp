<?php

namespace App\Livewire;

use App\Models\Resultado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CampeonatoFemenino extends Component
{
    public function render()
    {

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
    }
}
