<?php

namespace App\Http\Livewire\Settings;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Modal;

// Models
use App\Models\System\Tenant;

class Add extends Component
{
    use Modal;

    public Tenant $tenant;

    public $setting;
    public $value;

    public function render()
    {
        return view("segments.settings.add");
    }

    public function save()
    {
        $this->tenant->settings()->syncWithoutDetaching([
            $this->setting => ["value" => $this->value],
        ]);
        $this->close();
    }
}
