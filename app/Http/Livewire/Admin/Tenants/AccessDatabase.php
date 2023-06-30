<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AccessDatabase extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [
        "password" => "required",
    ];

    public $password = "";

    public function render()
    {
        return view("segments.admin.tenants.access-database");
    }

    public function save()
    {
        $this->authorize("access-database", $this->tenant);
        $this->validate();
        if (
            !Auth::guard("admin")->validate([
                "email" => auth()->user()->email,
                "password" => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                "password" => __("auth.password"),
            ]);
        }

        $this->close();

        return redirect($this->tenant->database->access());
    }
}
