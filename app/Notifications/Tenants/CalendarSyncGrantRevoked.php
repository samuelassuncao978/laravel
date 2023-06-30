<?php

namespace App\Notifications\Tenants;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Calendar;

class CalendarSyncGrantRevoked extends Notification
{
    use Queueable;

    protected $calendar;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Dear sir/madam,')
                    ->line('We can no longer synchronize your calendar because the access has been revoked.')
                    ->line('Be kind to provide us the proper grant.')
                    /* ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!') */
                ;
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
            'text' => 'We can no longer synchronize your calendar because the access has been revoked.',
        ];
    }
}
