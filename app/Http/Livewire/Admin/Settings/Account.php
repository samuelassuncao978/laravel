<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

class Account extends Component
{
    public User $user;

    public $rules = [];

    public function render()
    {
        return view("pages.admin.settings.account");
    }

    public function save()
    {
    }
}
