<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $reservation)
    {
        //
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('Order Status')
            ->from(env('MAIL_FROM_ADDRESS'), 'Sender')
            ->greeting('Hello!')
            ->line('Your order status has been updated')
            ->action('Check it out', url('/'))
            ->line('Best regards!');
    }

    public function toArray($notifiable): array
    {
        return [
            'email' => $this->reservation->client->email,
            'price' => $this->reservation->house->prices,
            'reference' => $this->reservation->house->reference
        ];
    }
}
