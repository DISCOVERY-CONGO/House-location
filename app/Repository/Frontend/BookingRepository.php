<?php

declare(strict_types=1);

namespace App\Repository\Frontend;

use App\Contracts\BookingHouseRepositoryInterface;
use App\Enums\HouseEnum;
use App\Enums\ReservationEnum;
use App\Jobs\ReservationJob;
use App\Models\Client;
use App\Models\House;
use App\Models\Reservation;
use App\Traits\RandomValues;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Client_QB;
use LaravelIdea\Helper\App\Models\_IH_Reservation_QB;

class BookingRepository implements BookingHouseRepositoryInterface
{
    use RandomValues;

    public function stored($attributes): Model|Builder
    {
        $house = $this->getHouse(attributes: $attributes);

        $client = $this->storeClients($attributes);

        $reservation = $this->createReservation($house, $attributes, $client);

        dispatch(new ReservationJob($reservation))->delay(now()->addSecond(10));

        alert()->success('Felicitation','Votre reservation a ete envoyer avec success');

        return $reservation;
    }

    public function getReservation(string $key): Model|Builder|null
    {
        return Reservation::query()
            ->select([
                'house_id',
                'id',
                'messages',
                'client_id',
            ])
            ->where('id', '=', $key)
            ->first();
    }

    private function getHouse($attributes): Model|Builder|null
    {
        return House::query()
            ->select([
                'id',
                'prices',
            ])
            ->where('id', '=', $attributes->input('apartment'))
            ->when('status',
                fn ($builder) => $builder->where('status', HouseEnum::VALIDATED_HOUSE)
            )
            ->first();
    }

    private function storeClients($attributes): Model|Builder|Client|_IH_Client_QB
    {
        return Client::query()
            ->create([
                'name' => $attributes->input('username'),
                'last_name' => $attributes->input('email'),
                'phones_number' => $attributes->input('phone_number'),
                'email' => $attributes->input('email'),
            ]);
    }

    private function createReservation($house, $attributes, $client): _IH_Reservation_QB|Reservation|Builder|Model
    {
        return Reservation::query()
            ->create([
                'house_id' => $house->id,
                'user_id' => auth()->id() ?? null,
                'status' => ReservationEnum::PENDING_RESERVATION,
                'messages' => $attributes->input('messages'),
                'client_id' => $client->id
            ]);
    }
}
