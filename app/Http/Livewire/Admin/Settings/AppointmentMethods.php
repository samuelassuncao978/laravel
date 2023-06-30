<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\AppointmentMethod;

class AppointmentMethods extends Component
{
    use Paginatable, Groupable, Searchable;

    public function mount()
    {
        $this->authorize("view-any", AppointmentMethod::class);
    }

    public function render()
    {
        $appointment_methods = new AppointmentMethod();

        if (!empty($this->search)) {
            $appointment_methods = $appointment_methods->where("name", "like", "%$this->search%");
        }

        return view("pages.admin.settings.appointment_methods", [
            "appointment_methods" => $appointment_methods->withheld()->paginate($this->rows),
        ]);
    }
}
