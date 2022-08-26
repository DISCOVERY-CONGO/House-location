<?php

declare(strict_types=1);

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ApartmentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $apartment)
    {
        //
    }

    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'id' => $this->apartment->id,
            'commune' => $this->apartment->commune,
            'town' => $this->apartment->town,
            'user' => $this->apartment->user->name,
            'email' => $this->apartment->user->email,
        ];
    }

    public function toArray(mixed $notifiable): array
    {
        return [
            //
        ];
    }
}
