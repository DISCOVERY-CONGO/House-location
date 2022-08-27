<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Contracts\CancelBookingRepositoryInterface;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CancelBookingRepository implements CancelBookingRepositoryInterface
{
    public function cancelReservation(string $key): Model|Builder
    {
        $reservation = Reservation::query()
            ->select([
                'id',
                'user_id',
            ])
            ->where('id', '=', $key)
            ->where('user_id', '=', auth()->id())
            ->firstOrFail();
        $reservation->delete();

        alert()->info('Information',"Votre reservation pour la maison  a ete annuler");

        return $reservation;
    }
}
