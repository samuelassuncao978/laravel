<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;
use App\Traits\Livewire\Pageable;

// Models
use App\Models\User;

class Index extends Component
{
    use Paginatable, Groupable, Searchable, Pageable;

    public function mount(Request $request)
    {
        $this->pge()->load("not", []);
    }

    public function render()
    {
        return view("pages.admin.settings.index")->layout("components.layout");
    }
}
