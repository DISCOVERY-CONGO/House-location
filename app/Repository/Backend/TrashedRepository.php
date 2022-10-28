<?php

declare(strict_types=1);

namespace App\Repository\Backend;

use App\Contracts\TrashedRepositoryInterface;
use App\Models\House;
use App\Traits\HasUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TrashedRepository implements TrashedRepositoryInterface
{
    use HasUpload;

    public function trashed(): array|Collection
    {
        return House::onlyTrashed()
            ->get();
    }

    public function restore(string $key): Model|Builder|House
    {
        $room = House::withTrashed()
            ->where('id', '=', $key)
            ->firstOrFail();
        $room->restore();

        return $room;
    }

    public function forceDelete(string $key): Model|Builder
    {
        $room = House::query()
            ->where('key', '=', $key)
            ->withTrashed()
            ->first();
        $this->removePathOfImages($room);
        $room->forceDelete();
        $room->categories()->detach();

        return $room;
    }
}
