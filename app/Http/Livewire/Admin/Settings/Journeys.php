<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Journey;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Journeys extends Component
{
    use Paginatable, Groupable, Searchable;

    public function render()
    {
        $journeys = new Journey();
        return view("pages.admin.settings.journeys", [
            "journeys" => $journeys->paginate($this->rows),
        ]);
    }
}
