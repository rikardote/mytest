<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Qna;
use Livewire\Component;

class Featured extends Component
{
    public Qna $qna;
    public string $name;
    public bool $active;

    public function mount()
    {
        $this->active = $this->qna->getAttribute('active');
    }

    public function render()
    {
        return view('livewire.buttons.featured');
    }

    public function updating($name, $value)
    {
        $this->qna->setAttribute($name, $value)->save();
    }
}
