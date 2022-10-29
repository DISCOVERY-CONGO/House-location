<?php

declare(strict_types=1);

namespace App\Repository\Backend\House;

use App\Contracts\ApartmentRepositoryInterface;
use App\Models\House;
use App\Services\FlashMessageService;
use App\Traits\HasRoomCrud;
use App\Traits\HasRandomValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ApartmentRepository implements ApartmentRepositoryInterface
{
    use HasRandomValue;
    use HasRoomCrud;

    public function getContents(): Collection
    {
        return House::query()
            ->latest('id')
            ->get([
                'id',
                'phone_number',
                'address',
                'prices',
                'warranty_price',
                'status'
            ]);
    }

    public function show(string $key): Model|Builder
    {
        $house = House::query()
            ->where('id', '=', $key)
            ->first();

        return $house->load(['type:id,name', 'detail', 'categories']);
    }

    public function deleted(string $key): Model|Builder|int|null
    {
        $room = $this->show(key: $key);
        $room->delete();
        return $room;
    }
}
