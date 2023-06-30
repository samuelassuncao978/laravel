<?php

namespace App\Http\Livewire\Admin\Employers;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Employer;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Employer $employer;

    public $suggested = null;

    public $rules = [
        "employer.name" => "required",
    ];

    public function mount()
    {
        $this->employer = new Employer();
    }

    public function render()
    {
        return view("segments.admin.employers.create");
    }

    public function save()
    {
        $this->employer->save();
        $this->close();
        return redirect("/admin/employers/" . $this->employer->id);
    }
}
