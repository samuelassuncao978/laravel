<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.tenants.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->tenant);

        $this->tenant->delete();
        $this->close();
    }
}
