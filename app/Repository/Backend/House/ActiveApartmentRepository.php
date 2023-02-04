<?php

declare(strict_types=1);

namespace App\Repository\Backend\House;

use App\Contracts\ActiveApartmentRepositoryInterface;
use App\Events\ActivateApartmentEvent;
use App\Http\Requests\ActiveRoom;
use App\Models\House;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActiveApartmentRepository implements ActiveApartmentRepositoryInterface
{
    public function handle(ActiveRoom $activeRoom): Model|_IH_House_QB|Builder|House|null
    {
        $room = House::query()
            ->where('id', '=', $activeRoom->input('room'))
            ->first();
        $room->update([
            'status' => $activeRoom->input('status'),
        ]);
        ActivateApartmentEvent::dispatch($room);

        return $room;
    }
}
