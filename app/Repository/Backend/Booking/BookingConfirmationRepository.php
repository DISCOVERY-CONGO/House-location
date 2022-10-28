<?php

declare(strict_types=1);

namespace App\Repository\Backend\Booking;

use App\Enums\ReservationEnum;
use App\Events\ReservationEvent;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Services\FlashMessageService;
use App\Traits\HasRandomValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BookingConfirmationRepository
{
    use HasRandomValue;

    public function __construct(protected FlashMessageService $service)
    {
    }

    public function confirmed(string $request): Model|Builder|Reservation
    {
        $reservation = Reservation::query()
            ->where('id', '=', $request)
            ->firstOrFail();
        $reservation->update([
            'status' => ReservationEnum::CONFIRMED_RESERVATION,
        ]);
        $transaction =Transaction::query()
            ->create([
                'client_id' => $reservation->client_id,
                'reservation_id' => $reservation->id,
                'payment_date' => now(),
                'code_transaction' => $this->generateRandomTransaction(10)
            ]);

        ReservationEvent::dispatch($reservation, $transaction);

        $this->service->success("La reservation $reservation->id, a ete confirmer");

        return $reservation;
    }
}
