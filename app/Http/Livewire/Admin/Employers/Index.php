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
use App\Traits\Livewire\Pageable;
use App\Traits\Livewire\Tabable;

class Index extends Component
{
    use Paginatable, Pageable, Tabable, Groupable, Searchable;

    public Employer $employer;

    public function mount(Request $request)
    {
        $this->employer = $request->employer ?? (Employer::first() ?? new Employer());
        $this->pge()->load($this->employer->id, [
            "employer" => $this->employer,
        ]);
        $this->tab()->load("locations", ["employer" => $this->employer]);
    }

    public function render()
    {
        $employers = new Employer();

        if (!empty($this->search)) {
            $employers = $employers->where("name", "like", "%$this->search%");
        }

        return view("pages.admin.employers.index", [
            "employers" => $employers->paginate($this->rows),
        ])->layout("components.layout");
    }
}
