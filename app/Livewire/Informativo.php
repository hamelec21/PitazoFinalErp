<?php

namespace App\Livewire;

use App\Models\Comunicado;
use Livewire\Component;
use Carbon\Carbon;

class Informativo extends Component
{


public $comunicado;

public function mount()
{
    // Eliminar los comunicados viejos cuando se monta el componente
    $this->deleteOldComunicados();
}

// Cargar el comunicado más reciente
public function render()
{
    // Obtener el primer comunicado disponible
    $this->comunicado = Comunicado::limit(1)->first();

    return view('livewire.informativo');
}

// Función para eliminar los comunicados de más de 3 días
public function deleteOldComunicados()
{
    $date = Carbon::now()->subDays(3);
    Comunicado::where('created_at', '<', $date)->delete();
}
}
