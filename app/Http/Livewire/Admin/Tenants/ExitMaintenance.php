<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

class ExitMaintenance extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.tenants.exit-maintenance");
    }

    public function save()
    {
        $this->authorize("exit-maintenance", $this->tenant);

        $this->tenant->maintenance_at = null;
        $this->tenant->maintenance_reason = null;
        $this->tenant->save();
        $this->close();
    }
}
