<?php

namespace App\Http\Livewire\Admin\Authentication;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    use Modal;

    public function render()
    {
        return view("segments.admin.authentication.logout");
    }

    public function save()
    {
        Auth::guard("admin")->logout();
        return redirect("/admin");
    }
}
