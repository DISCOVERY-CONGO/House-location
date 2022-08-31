<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class ApartmentNotification extends Notification
{
    use Queueable;

    public function __construct(public $apartment)
    {
        //
    }

    public function via(mixed $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            'commune' => $this->apartment->commune,
            'user' => $this->apartment->user->name,
            'email' => $this->apartment->user->email,
            'user_id' => $this->apartment->user->id
        ];
    }

    public function toBroadcast(mixed $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'user_id' => $this->apartment->user->id,
            'email' => $this->apartment->user->email
        ]);
    }
}
