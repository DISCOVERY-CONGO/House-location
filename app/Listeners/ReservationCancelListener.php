<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Enums\UserRoleEnum;
use App\Models\User;
use App\Notifications\ReservationCancelNotification;
use Illuminate\Support\Facades\Notification;

class ReservationCancelListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $admin = User::query()
            ->where('role_id', '=', UserRoleEnum::ADMINS_ROLE)
            ->first();

        Notification::send($admin, new ReservationCancelNotification($event->reservation));
    }
}
