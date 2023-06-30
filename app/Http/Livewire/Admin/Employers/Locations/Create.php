<?php

namespace App\Http\Livewire\Admin\Employers\Locations;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Employer;
use App\Models\EmployerLocation;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Employer $employer;
    public EmployerLocation $employerlocation;

    public $suggested = null;

    public $rules = [
        "employerlocation.name" => "required",
    ];

    public function mount()
    {
        $this->employerlocation = new EmployerLocation();
    }

    public function render()
    {
        return view("segments.admin.employers.locations.create");
    }

    public function save()
    {
        $this->employerlocation->employer_id = $this->employer->id;
        $this->employerlocation->save();
        $this->close();
    }
}
