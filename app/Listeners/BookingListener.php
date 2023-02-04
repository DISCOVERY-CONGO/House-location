<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Enums\UserRoleEnum;
use App\Models\Client;
use App\Models\User;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Notification;

class BookingListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        $user = User::query()
            ->where('role_id', '=', UserRoleEnum::USERS_ROLE)
            ->orWhere('role_id', '=', UserRoleEnum::ADMINS_ROLE)
            ->first();
        $clients = Client::query()
            ->where('id', '=', $user->id)
            ->first();
        Notification::send([$clients, $user], new BookingNotification($event->reservation));
    }
}
