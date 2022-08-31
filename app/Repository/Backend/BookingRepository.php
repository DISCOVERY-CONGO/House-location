<?php

declare(strict_types=1);

namespace App\Repository\Backend;

use App\Contracts\BookingRepositoryInterface;
use App\Events\ReservationCancelEvent;
use App\Models\Reservation;
use App\Services\ToastService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookingRepository implements BookingRepositoryInterface
{
    public function __construct(protected ToastService $service)
    {
    }

    public function getContents(): Collection|array
    {
        return Reservation::query()
            ->select([
                'id',
                'house_id',
                'status',
                'client_id',
            ])
            ->with(['house:id,reference,images', 'client:id,name,phones_number'])
            ->orderByDesc('created_at')
            ->get();
    }

    public function show(string $key): Model|Builder|null
    {
        $user = $this->getReservation(key: $key);

        return $user->load(['house', 'client']);
    }

    public function deleted(string $key): Model|Builder|null
    {
        $reservation = $this->getReservation(key: $key);
        ReservationCancelEvent::dispatch($reservation);
        $reservation->delete();

        $this->service->success("La reservation $reservation->id a ete supprimer");

        return $reservation;
    }

    private function getReservation(string $key): null|Builder|Model
    {
        return Reservation::query()
            ->select([
                'id',
                'house_id',
                'status',
                'messages',
                'client_id',
            ])
            ->where('id', '=', $key)
            ->first();
    }
}
