<?php

namespace App\Http\Controllers\Api;

use App\Contracts\BookingHouseRepositoryInterface;
use App\Contracts\HomeRepositoryInterface;
use App\Enums\HouseEnum;
use App\Enums\ReservationEnum;
use App\Events\BookingEvent;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\House;
use App\Models\Reservation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeApiController extends Controller
{
    public function __construct(
        public HomeRepositoryInterface $repository,
        public BookingHouseRepositoryInterface $reservation
    ) {
    }

    public function home()
    {
        return json_encode([
            'apartments' => $this->repository->getContent(),
            'sliders' => $this->repository->getSliders(),
            'all'=>$this->repository->getAll()
        ]);
    }

    public function details_homes(Request $request){
        return json_encode(
            \App\Models\House::query()
                ->where('id', '=', $request->id)
                ->withCount(['reservations' => function($builder) {
                    $builder->where('status', false);
                }])
                ->firstOrFail()
        );
    }

    public function reservation(Request $request){
        $house = House::query()
            ->select([
                'id',
                'prices',
            ])
            ->where('id', '=', $request->apartment)
            ->when('status',
                fn ($builder) => $builder->where('status', HouseEnum::VALIDATED_HOUSE)
            )
            ->first();

        $client = Client::query()
            ->create([
                'name' => $request->username,
                'last_name' => $request->email,
                'phones_number' => $request->phone_number,
                'email' => $request->email,
            ]);;

        $reservation = Reservation::query()
            ->create([
                'house_id' => $house->id,
                'user_id' => auth()->id() ?? null,
                'status' => ReservationEnum::PENDING_RESERVATION,
                'messages' => $request->messages,
                'client_id' => $client->id
            ]);

        BookingEvent::dispatch($reservation);

        return json_encode($reservation->house->reference);
    }
}
