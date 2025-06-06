<?php

namespace App\Livewire;

use App\Models\Resultado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CampeonatoAdulto extends Component
{

    public function render()
    {
        // Caching can be applied if the data doesn't change frequently
    $tipo_serie_id = 1;

    // Query para todas las series adultas
    $series = Resultado::with('clubnombre')
        ->where('tipo_serie_id', $tipo_serie_id)
        ->select(
            'club_id',
            'serie_id',
            DB::raw('SUM(puntos) as total_puntos'),
            DB::raw('SUM(goles_local) as goles_a_favor'),
            DB::raw('SUM(goles_visitante) as goles_en_contra'),
            DB::raw('COUNT(*) as partidos_jugados'),
            DB::raw('SUM(CASE WHEN puntos = 3 THEN 1 ELSE 0 END) as partidos_ganados'),
            DB::raw('SUM(CASE WHEN puntos = 0 THEN 1 ELSE 0 END) as partidos_perdidos'),
            DB::raw('SUM(CASE WHEN puntos = 1 THEN 1 ELSE 0 END) as partidos_empatados')
        )
        ->groupBy('club_id', 'serie_id')
        ->orderBy('total_puntos', 'desc')
        ->get()
        ->groupBy('serie_id');

<<<<<<< HEAD
    // Separar resultados por serie
    $resultados = $series->get(1, collect()); // Primeras serie adulta
    $primeras = $series->get(1, collect()); // Primeras serie adulta
    $segundas = $series->get(2, collect()); // Segunda serie adulta
    $terceras = $series->get(3, collect()); // Tercera serie adulta
    $seniors = $series->get(4, collect()); // Senior serie adulta
    $sub45s = $series->get(5, collect()); // Sub45 serie adulta
        // dd($primeras);
=======

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
>>>>>>> 9ed20951d27992a39ce8f0545525175b0a6d8696

        return view('livewire.campeonato-adulto', compact('resultados', 'terceras','segundas','seniors','sub45s','primeras'));
    }
}
