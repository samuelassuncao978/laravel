<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public $type = "unreadNotifications";

    public $show_settings = false;

    public $settings = ["sounds" => true, "summaries" => true];

    public function getListeners()
    {
        return [
            "echo-notification:App.Models.User." . auth()->user()->id . ", notification" => "notification_received",
        ];
    }

    public function notification_received($notification = [])
    {
        $this->emitSelf("new-notification", $notification);
    }

    public function updatedSettings()
    {
        $user = auth()->user();
        $user->notification_sounds = $this->settings["sounds"];
        $user->notification_summaries = $this->settings["summaries"];
        $user->save();
    }

    public function mark_all_read()
    {
        auth()
            ->user()
            ->unreadNotifications()
            ->update(["read_at" => now()]);
    }

    public function render()
    {
        $user = auth()->user();
        $this->settings["sounds"] = $user->notification_sounds;
        $this->settings["summaries"] = $user->notification_summaries;

        return view("segments.notifications.index", [
            "unread" => auth()
                ->user()
                ->unreadNotifications()
                ->count(),
            "total" => auth()
                ->user()
                ->notifications()
                ->count(),
            "notifications" => auth()->user()->{$this->type} ?? collect([]),
        ]);
    }

    public function toggle()
    {
        $this->type = $this->type === "unreadNotifications" ? "notifications" : "unreadNotifications";
    }

    public function read($id)
    {
        $notification = auth()
            ->user()
            ->notifications()
            ->find($id);
        $notification->markAsRead();
    }
}
