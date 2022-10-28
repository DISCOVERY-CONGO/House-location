<?php

declare(strict_types=1);

namespace App\Repository\Backend\Booking;

use App\Enums\ReservationEnum;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Services\FlashMessageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CancelBookingRepository
{
    public function __construct(protected FlashMessageService $service)
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

        $this->service->success("La reservation $reservation->id, a ete supprimer");

        return $reservation;
    }
}
