<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Modal;

class Change extends Component
{
    use Modal;

    public Tenant $tenant;

    public $rules = [
        "tenant.plan" => "string",
    ];

    public function render()
    {
        $plans = array_diff(scandir(app_path("Plans")), ["..", "."]);

        $plans = collect($plans)->map(function ($p) {
            return [
                "id" => str_replace(".php", "", $p),
                "text" => str_replace(".php", "", $p),
            ];
        });

        return view("segments.admin.plans.change", [
            "plans" => $plans->toArray(),
        ]);
    }

    public function save()
    {
        $this->tenant->save();
        $this->close();
    }
}
