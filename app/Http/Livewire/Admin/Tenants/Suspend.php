<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

class Suspend extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [
        "tenant.suspended_reason" => "string|nullable",
    ];

    public function render()
    {
        return view("segments.admin.tenants.suspend");
    }

    public function save()
    {
        $this->authorize("suspend", $this->tenant);

        $this->tenant->suspended_at = now();
        $this->tenant->save();
        $this->close();
    }
}
