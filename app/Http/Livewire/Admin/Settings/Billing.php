<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;
use App\Models\AppointmentType;

class Billing extends Component
{
    public User $user;

    public $rules = [];

    public function render()
    {
        return view("pages.admin.settings.billing");
    }

    public function save()
    {
    }
}
