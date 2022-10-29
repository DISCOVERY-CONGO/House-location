<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Notifications\ActivateApartmentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class ActivateApartmentJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public $room)
    {
        //
    }

    public function handle()
    {
        Notification::send($this->room['email'], new ActivateApartmentNotification($this->room));
    }
}
