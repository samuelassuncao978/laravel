<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\User;
use App\Models\File;
use App\Models\AppointmentType;

class Profile extends Component
{
    public User $user;

    public $user_appointment_types = [];

    public $rules = [
        "user.photo.name" => "required",
        "user.photo.size" => "nullable",
        "user.photo.mime" => "nullable",
        "user.photo.id" => "uuid",
        "user_appointment_types.*.pivot.amount" => "string",
    ];

    public $selected = [];

    public function mount()
    {
        $this->user_appointment_types = collect($this->user->appointment_types)
            ->keyBy("id")
            ->toArray();
        $this->selected = collect($this->user->appointment_types)
            ->keyBy("id")
            ->toArray();
    }

    public function render()
    {
        $this->user_appointment_types = collect($this->user->appointment_types)
            ->whereIn("id", [$this->selected])
            ->keyBy("id")
            ->toArray();

        $types = AppointmentType::all();

        return view("pages.admin.users.profile", [
            "appointment_types" => $types,
        ]);
    }

    public function save()
    {
        if ($this->user->photo->isDirty()) {
            $this->user->photo->persist(true);
        }

        $this->user->save();
        $this->user->appointment_types()->sync(
            collect($this->user_appointment_types)->mapWithKeys(function ($type, $id) {
                return [$id => $type["pivot"]];
            })
        );
    }
}
