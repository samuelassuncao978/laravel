<?php

namespace App\Http\Livewire\Portal\Authentication;

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
use App\Models\Client;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public function render()
    {
        return view("pages.portal.authentication.login")->layout("segments.organization.login-layout");
    }

    public function save(Request $request)
    {
        if (RateLimiter::tooManyAttempts(Str::lower($this->email) . "|" . $request->ip(), 5)) {
            event(new Lockout($request));
            $seconds = RateLimiter::availableIn(Str::lower($this->email) . "|" . $request->ip());
            throw ValidationException::withMessages([
                "email" => trans("auth.throttle", [
                    "seconds" => $seconds,
                    "minutes" => ceil($seconds / 60),
                ]),
            ]);
        }

        if (!Auth::guard("client")->attempt(["email" => $this->email, "password" => $this->password], $this->remember)) {
            RateLimiter::hit(Str::lower($this->email) . "|" . $request->ip());
            throw ValidationException::withMessages([
                "email" => __("auth.failed"),
            ]);
        }
        RateLimiter::clear(Str::lower($this->email) . "|" . $request->ip());
        $request->session()->regenerate();

        return redirect()->intended("/portal");
    }
}
