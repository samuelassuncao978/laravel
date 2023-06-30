<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

class EnterMaintenance extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [
        "tenant.maintenance_reason" => "string|nullable",
    ];

    public function render()
    {
        return view("segments.admin.tenants.enter-maintenance");
    }

    public function save()
    {
        $this->authorize("enter-maintenance", $this->tenant);

        $this->tenant->maintenance_at = now();
        $this->tenant->save();
        $this->close();
    }
}
