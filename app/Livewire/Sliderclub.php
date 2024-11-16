<?php

namespace App\Livewire;

use App\Models\Club;
use Livewire\Component;

class Sliderclub extends Component
{

    public function render()
    {
        $clubes = Club::orderBy('nombre', 'asc')->limit(15)->get();

        return view('livewire.sliderclub',compact('clubes'));
    }
}
