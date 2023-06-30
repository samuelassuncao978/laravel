<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VersionUpgrade extends Component
{
    public $notification = null;

    public function mount()
    {
        $this->notification = optional(
            optional(optional(auth()->user())->notifications())->where([
                "type" => "App\Notifications\VersionUpgradeNotification",
                "read_at" => null,
            ])
        )->first();
    }

    public function render()
    {
        return view("components.version-upgrade-message");
    }

    public function read()
    {
        $this->notification->markAsRead();
        $this->notification = false;
    }
}
