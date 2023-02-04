<?php

declare(strict_types=1);

namespace App\Repository\Backend\Booking;

use App\Events\ReservationEvent;
use App\Http\Requests\Backend\StatusBookingRequest;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Traits\HasRandomValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BookingStateRepository implements \App\Contracts\BookingStateRepository
{
    use HasRandomValue;

    public function handle(StatusBookingRequest $request): Model|Builder|Reservation
    {
        $reservation = Reservation::query()
            ->where('id', '=', $request->input('booking'))
            ->firstOrFail();
        $reservation->update([
            'status' => $request->input('status'),
        ]);
        $transaction = Transaction::query()
            ->create([
                'client_id' => $reservation->client_id,
                'reservation_id' => $reservation->id,
                'payment_date' => now(),
                'code_transaction' => $this->generateRandomTransaction(10),
            ]);
        ReservationEvent::dispatch($reservation, $transaction);

        return $reservation;
    }
}
