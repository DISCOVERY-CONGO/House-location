<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $reservation, public $transaction)
    {
        //
    }

    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
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
            'transaction_code' => $this->transaction->code_transaction,
            'email' => $this->reservation->client->email,
            'price' => $this->reservation->house->prices
        ];
    }
}
