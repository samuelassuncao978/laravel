<?php

namespace App\Http\Livewire\Admin\Intergrations;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Intergration;

class Recover extends Component
{
    use Modal;

    public Intergration $intergration;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.intergrations.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->intergration);

        $this->intergration->restore();
        $this->close();
    }
}
