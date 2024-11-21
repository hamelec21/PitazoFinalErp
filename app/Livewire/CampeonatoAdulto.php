<?php

namespace App\Livewire;

use App\Models\Resultado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CampeonatoAdulto extends Component
{
    public function render()
    {
        $resultados = Resultado::with('clubnombre')
            ->where('tipo_serie_id', 1) // Suponiendo que 1 es el ID de la serie adulta
            ->select('club_id', DB::raw('SUM(puntos) as total_puntos'))
            ->groupBy('club_id')
            ->orderBy('total_puntos', 'desc')
            ->get();

        //query para terceras series adultas

        $terceras = Resultado::with('clubnombre')
        ->where('tipo_serie_id', 1)
        ->where('serie_id', 3)
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


        //query para segunda serie adulta

        $segundas = Resultado::with('clubnombre')
        ->where('tipo_serie_id', 1)
        ->where('serie_id', 2)
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

         //query para senior serie adulta

         $seniors = Resultado::with('clubnombre')
         ->where('tipo_serie_id', 1)
         ->where('serie_id', 4)
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


         //query para sub45 serie adulta

         $sub45s= Resultado::with('clubnombre')
         ->where('tipo_serie_id', 1)
         ->where('serie_id', 5)
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

        //query para Primeras serie adulta

         $primeras= Resultado::with('clubnombre')
         ->where('tipo_serie_id', 1)
         ->where('serie_id', 1)
         ->select(
             'club_id',
             DB::raw('SUM(puntos) as total_puntos'),
             DB::raw('SUM(goles_visitante+goles_local) as goles_a_favor'),
             DB::raw('SUM(goles_visitante) as goles_en_contra'),
             DB::raw('COUNT(*) as partidos_jugados'),
             DB::raw('SUM(CASE WHEN puntos = 3 THEN 1 ELSE 0 END) as partidos_ganados'),
             DB::raw('SUM(CASE WHEN puntos = 0 THEN 1 ELSE 0 END) as partidos_perdidos'),
             DB::raw('SUM(CASE WHEN puntos = 1 THEN 1 ELSE 0 END) as partidos_empatados')
         )
         ->groupBy('club_id')
         ->orderBy('total_puntos', 'desc')
         ->get();

        return view('livewire.campeonato-adulto', compact('resultados', 'terceras','segundas','seniors','sub45s','primeras'));
    }
}
