<?php

namespace App\Http\Livewire\Organization\Authentication;

// Illuminate
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Traits\Livewire\Modal;

class Logout extends Component
{
    use Modal;

    public function render()
    {
        return view("segments.organization.authentication.logout");
    }

    public function save()
    {
        Auth::guard("organization")->logout();
        return redirect("/organization");
    }
}
