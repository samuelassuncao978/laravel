<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $notification = null;

    public function mount()
    {
        $this->notification = optional(
            optional(optional(auth()->user())->notifications())->where([
                "type" => "App\Notifications\WelcomeNotification",
                "read_at" => null,
            ])
        )->first();
    }

    public function render()
    {
        return view("components.welcome-message");
    }

    public function read()
    {
        $this->notification->markAsRead();
        $this->notification = false;
    }
}
