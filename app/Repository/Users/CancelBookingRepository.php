<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Contracts\CancelBookingRepositoryInterface;
use App\Events\ReservationCancelEvent;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CancelBookingRepository implements CancelBookingRepositoryInterface
{
    public function cancelReservation(string $key): Model|Builder
    {
        $reservation = Reservation::query()
            ->where('id', '=', $key)
            ->where('user_id', '=', auth()->id())
            ->firstOrFail();
        ReservationCancelEvent::dispatch($reservation);
        $reservation->delete();

        return $reservation;
    }
}
