<?php

namespace App\Http\Livewire\Organization;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Index extends Component
{
    public function render()
    {
        return view("pages.organization.dashboard.index")->layout("components.container");
    }
}
