<?php

namespace App\Http\Livewire\Admin\Employers;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Employer;
use App\Models\EmployerLocation;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Locations extends Component
{
    use Paginatable, Groupable, Searchable;

    public Employer $employer;

    public function render()
    {
        $locations = $this->employer->locations();
        return view("pages.admin.employers.locations", [
            "locations" => $locations->paginate($this->rows),
        ]);
    }
}
