<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

class Unsuspend extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.tenants.unsuspend");
    }

    public function save()
    {
        $this->authorize("unsuspend", $this->tenant);

        $this->tenant->suspended_at = null;
        $this->tenant->suspended_reason = null;
        $this->tenant->save();
        $this->close();
    }
}
