<?php

namespace App\Livewire;

use App\Models\Resultado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TablaGeneral extends Component
{

        public function render()
        {
            $resultados = Resultado::with('clubnombre')
            ->where('tipo_serie_id', 1) // Suponiendo que 1 es el ID de la serie adulta
            ->select('club_id', DB::raw('SUM(puntos) as total_puntos'))
            ->groupBy('club_id')
            ->orderBy('total_puntos', 'desc')
            ->get();

            return view('livewire.tabla-general', compact('resultados'));
        }


}
