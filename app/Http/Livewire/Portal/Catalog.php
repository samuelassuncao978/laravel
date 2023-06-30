<?php

namespace App\Http\Livewire\Portal;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\User;

class Catalog extends Component
{
    public $users = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view("pages.portal.catalog.livewire")->layout("layouts.portal");
    }
}
