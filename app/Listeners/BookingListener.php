<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Enums\UserRoleEnum;
use App\Models\Client;
use App\Models\User;
use App\Notifications\BookingNotification;
use App\Notifications\ReservationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class BookingListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        $client = User::query()
            ->where('role_id', '=', UserRoleEnum::USERS_ROLE)
            ->orWhere('role_id', '=', UserRoleEnum::ADMINS_ROLE)
            ->first();
        $clients = Client::query()
            ->where('id', '=', $client->id)
            ->first();
        Notification::send([$clients, $client], new BookingNotification($event->reservation));
    }
}
