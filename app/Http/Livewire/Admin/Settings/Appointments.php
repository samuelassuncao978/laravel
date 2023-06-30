<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\AppointmentType;

class Appointments extends Component
{
    public $user_appointment_types = [];
    public $appointment_types = [];

    public function mount()
    {
        $this->appointment_types = AppointmentType::all();
        $this->user_appointment_types = array_merge(
            $this->appointment_types
                ->keyBy("id")
                ->map(function ($type) {
                    return [
                        "enabled" => false,
                        "methods" => $type->appointment_methods
                            ->keyBy("id")
                            ->map(function () {
                                return ["enabled" => true];
                            })
                            ->toArray(),
                    ];
                })
                ->toArray(),
            auth()
                ->guard("admin")
                ->user()
                ->appointment_types->keyBy("id")
                ->map(function ($type) {
                    return array_merge(
                        ["enabled" => true],
                        collect($type->pivot)
                            ->only("amount", "duration")
                            ->toArray(),
                        [
                            "methods" => $type->appointment_methods
                                ->keyBy("id")
                                ->map(function () {
                                    return ["enabled" => true];
                                })
                                ->toArray(),
                        ]
                    );
                })
                ->toArray()
        );
    }

    public function render()
    {
        return view("pages.admin.settings.appointments");
    }

    public function save()
    {
        auth()
            ->guard("admin")
            ->user()
            ->appointment_types()
            ->sync(
                collect($this->user_appointment_types)
                    ->filter(function ($type) {
                        return optional($type)["enabled"];
                    })
                    ->mapWithKeys(function ($type, $id) {
                        return [
                            $id => collect($type)
                                ->except("enabled", "methods")
                                ->toArray(),
                        ];
                    })
            );
    }
}
