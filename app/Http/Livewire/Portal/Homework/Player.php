<?php

namespace App\Http\Livewire\Portal\Homework;

use App\Http\Livewire\Component;

// Models
use App\Models\Homework;

// Traits
use App\Traits\Livewire\Modal;

class Player extends Component
{
    use Modal;

    public Homework $homework;

    public function render()
    {
        return view("segments.portal.homework.player");
    }
}
