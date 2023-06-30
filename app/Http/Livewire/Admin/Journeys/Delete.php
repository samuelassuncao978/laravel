<?php

namespace App\Http\Livewire\Admin\Journeys;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Journey;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Journey $journey;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.journeys.delete");
    }

    public function save()
    {
        $this->journey->delete();
        $this->close();
    }
}
