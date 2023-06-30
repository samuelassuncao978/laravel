<?php

namespace App\Http\Livewire\Admin\Employers;

use App\Http\Livewire\Component;

// Models
use App\Models\Employer;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Employer $employer;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.employers.delete");
    }

    public function save()
    {
        $this->employer->delete();
        $this->close();
    }
}
