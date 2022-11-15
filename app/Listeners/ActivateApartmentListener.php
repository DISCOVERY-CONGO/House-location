<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Enums\UserRoleEnum;
use App\Models\User;
use App\Notifications\ActivateApartmentNotification;
use App\Notifications\ApartmentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ActivateApartmentListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $admin = User::query()
            ->where('role_id', '=', UserRoleEnum::ADMINS_ROLE)
            ->first();
        $manager = User::query()
            ->where('id', '=', $event->room->user_id)
            ->first();

        Notification::send([$admin, $manager], new ActivateApartmentNotification($event->room));
    }
}
