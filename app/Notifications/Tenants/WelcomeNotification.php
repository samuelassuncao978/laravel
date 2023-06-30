<?php

namespace App\Notifications\Tenants;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $password;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password, $url)
    {
        //
        $this->password = $password;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["mail"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())->line("Your new setup is complete. You can login using the link below using your email and the default password. " . $this->password)->action("Login", 'https://'.$this->url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
                //
            ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([]);
    }
}
