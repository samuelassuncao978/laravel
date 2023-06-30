<?php

namespace App\Http\Livewire\Admin\Support;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

class Index extends Component
{
    public function render()
    {
        return view("pages.admin.support.index")->layout("components.container");
    }
}
