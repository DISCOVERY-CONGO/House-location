<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivateApartmentNotification extends Notification
{
    use Queueable;

    public function __construct(public $room)
    {
        //
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->line('One of your invoices has been paid!')
            ->view('frontend.domain.email.reservation')
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [
            'reference' => $this->room->reference,
            'email' => $this->room->email,
            'user' => $this->room->user->name
        ];
    }
}
