<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $name = "Hector";

    public function render()
    {
        return view('livewire.test');
    }

}
