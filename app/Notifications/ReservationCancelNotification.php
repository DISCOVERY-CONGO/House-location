<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationCancelNotification extends Notification
{
    use Queueable;

    public function __construct(public  $reservation)
    {
        //
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [
            'user' => $this->reservation->user->email,
            'house' => $this->reservation->house->reference,
        ];
    }
}
