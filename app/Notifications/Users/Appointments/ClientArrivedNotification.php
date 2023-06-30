<?php

namespace App\Notifications\Users\Appointments;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

// Models
use App\Models\Appointment;

class ClientArrivedNotification extends Notification
{
    use Queueable;

    public $appointment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        //
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["database", "broadcast"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line("The introduction to the notification.")
            ->action("Notification Action", url("/"))
            ->line("Thank you for using our application!");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $client = $this->appointment->clients()->first();
        return [
            "title" => "Client arrived",
            "description" => "Your client $client->first_name $client->last_name has arrived.",
            "icon" => "clipboard-check",
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(["sound" => "check-in"]);
    }
}
