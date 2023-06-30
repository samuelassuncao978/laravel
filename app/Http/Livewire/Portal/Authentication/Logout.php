<?php

namespace App\Http\Livewire\Portal\Authentication;

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
        return view("segments.portal.authentication.logout");
    }

    public function save()
    {
        Auth::guard("client")->logout();
        return redirect("/portal");
    }
}
