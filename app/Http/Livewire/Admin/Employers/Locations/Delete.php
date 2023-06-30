<?php

namespace App\Http\Livewire\Admin\Employers\Locations;

use App\Http\Livewire\Component;

// Models
use App\Models\EmployerLocation;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public EmployerLocation $employerlocation;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.employers.locations.delete");
    }

    public function save()
    {
        $this->employerlocation->delete();
        $this->close();
    }
}
