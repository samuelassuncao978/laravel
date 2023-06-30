<?php

namespace App\Http\Livewire\Admin\Employers;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Employer;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Appointments extends Component
{
    use Paginatable, Groupable, Searchable;

    public Employer $employer;

    public function render()
    {
        $appointments = $this->employer->appointments();
        return view("pages.admin.employers.appointments", [
            "appointments" => $appointments->paginate($this->rows),
        ]);
    }
}
