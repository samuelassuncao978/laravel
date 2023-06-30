<?php

namespace App\Http\Livewire\Admin\Employers\Locations;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\EmployerLocation;

// Traits
use App\Traits\Livewire\Modal;

class Edit extends Component
{
    use Modal;

    public EmployerLocation $employerlocation;

    public $suggested = null;

    public $rules = [
        "employerlocation.name" => "required",
    ];

    public function render()
    {
        return view("segments.admin.employers.locations.edit");
    }

    public function save()
    {
        $this->employerlocation->save();
        $this->close();
    }
}
