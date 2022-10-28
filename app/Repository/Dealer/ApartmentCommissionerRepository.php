<?php

declare(strict_types=1);

namespace App\Repository\Dealer;

use App\Contracts\ApartmentCommissionerRepositoryInterface;
use App\Models\House;
use App\Traits\HasRoomCrud;
use App\Traits\HasUpload;
use App\Traits\HasRandomValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ApartmentCommissionerRepository implements ApartmentCommissionerRepositoryInterface
{
    use HasUpload, HasRandomValue, HasRoomCrud;

    public function getContents(): Collection|array
    {
        return House::query()
            ->where('user_id', '=', auth()->id())
            ->orderByDesc('created_at')
            ->get();
    }

    public function show(string $key): Model
    {
        $house = $this->getHouse($key);

        return $house->load('categories', 'type');
    }

    public function deleted(string $key): Model|Builder
    {
        $room = $this->getHouse(key: $key);
        $room->delete();

        return $room;
    }
}
