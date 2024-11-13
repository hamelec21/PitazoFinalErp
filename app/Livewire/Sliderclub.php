<?php

namespace App\Livewire;

use App\Models\Club;
use Livewire\Component;

class Sliderclub extends Component
{

    public function render()
    {
        $clubes = Club::orderBy('nombre', 'asc')->get();
        return view('livewire.sliderclub',compact('clubes'));
    }
}
