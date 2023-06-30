<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\AppointmentType;

class AppointmentTypes extends Component
{
    use Paginatable, Groupable, Searchable;

    public function mount()
    {
        $this->authorize("view-any", AppointmentType::class);
    }

    public function render()
    {
        $appointment_types = new AppointmentType();

        if (!empty($this->search)) {
            $appointment_types = $appointment_types->where("name", "like", "%$this->search%");
        }

        return view("pages.admin.settings.appointment_types", [
            "appointment_types" => $appointment_types->withheld()->paginate($this->rows),
        ]);
    }
}
