<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Enums\UserRoleEnum;
use App\Models\House;
use App\Models\User;
use App\Notifications\ApartmentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ApartmentCreateListener
{
    public function __construct()
    {
        //
    }

    public function handle($event): void
    {
        $admin = User::query()
            ->where('role_id', '=', UserRoleEnum::ADMINS_ROLE)
            ->first();

        Notification::send($admin, new ApartmentNotification($event->apartment));
    }
}
