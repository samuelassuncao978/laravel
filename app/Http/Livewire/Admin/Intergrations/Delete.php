<?php

namespace App\Http\Livewire\Admin\Intergrations;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Intergration;

class Delete extends Component
{
    use Modal;

    public Intergration $intergration;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.intergrations.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->intergration);

        $this->intergration->delete();
        $this->close();
    }
}
