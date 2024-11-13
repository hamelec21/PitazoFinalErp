<?php

namespace App\Livewire;

use App\Models\FechaFixture;
use App\Models\Sancion;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class OficioSanciones extends Component
{


    public $fecha_id;

    public function mount()
    {


    }

    public function Sancionpdf()
    {
        $sanciones = Sancion::where('fecha_id', $this->fecha_id)->get();

        // Puedes usar dd($sanciones) para verificar los datos si es necesario
        // dd($sanciones);

        $pdf = Pdf::loadView('pdf.oficio-sanciones', compact('sanciones'));

        return $pdf->download('oficio-sanciones.pdf');
    }



    public function render()
    {
        $FechaFixture = FechaFixture::all();
        return view('livewire.oficio-sanciones', compact('FechaFixture'));
    }
}
