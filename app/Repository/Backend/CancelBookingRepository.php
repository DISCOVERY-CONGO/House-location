<?php

declare(strict_types=1);

namespace App\Repository\Backend;

use App\Enums\ReservationEnum;
use App\Jobs\ConfirmedReservationJob;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Services\ToastService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CancelBookingRepository
{
    public function __construct(protected ToastService $service)
    {
    }

    public function inactive(string $request): Model|Builder|Reservation
    {
        $reservation = Reservation::query()
            ->where('id', '=', $request)
            ->firstOrFail();
        $reservation->update([
            'status' => ReservationEnum::INVALIDATED_RESERVATION,
        ]);

        Transaction::query()
            ->where('reservation_id', '=', $reservation->id)
            ->where('client_id','=', $reservation->client_id)
            ->delete();

        dispatch(new ConfirmedReservationJob($reservation))->delay(now()->addSecond(15));

        $this->service->success("La reservation $reservation->id, a ete supprimer");

        alert()->info('Information',"Votre reservation pour la maison a ete annuler");

        return $reservation;
    }
}
