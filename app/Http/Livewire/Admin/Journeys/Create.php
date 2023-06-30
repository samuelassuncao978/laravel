<?php

namespace App\Http\Livewire\Admin\Journeys;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Journey;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Journey $journey;

    public $rules = [
        "journey.name" => "string",
    ];

    public function mount()
    {
        $this->journey = new Journey();
    }

    public function render()
    {
        return view("segments.admin.journeys.create");
    }

    public function save()
    {
        $this->journey->save();
        $this->close();
    }
}
