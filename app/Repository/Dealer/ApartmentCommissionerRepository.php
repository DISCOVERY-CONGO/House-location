<?php
declare(strict_types=1);

namespace App\Repository\Dealer;

use App\Contracts\ApartmentCommissionerRepositoryInterface;
use App\Enums\UserRoleEnum;
use App\Models\House;
use App\Traits\ApartmentCrud;
use App\Traits\ImageUploader;
use App\Traits\RandomValues;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ApartmentCommissionerRepository implements ApartmentCommissionerRepositoryInterface
{
    use ImageUploader, RandomValues, ApartmentCrud;

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
        toast('L appartement a été suspéndue pour des raisons de sécurité', 'success');
        return $room;
    }

    private function getHouse(string $key): Builder|Model
    {
        return House::query()
            ->where('user_id', '=', UserRoleEnum::COMMISSIONNERS)
            ->where('key', '=', $key)
            ->withCount('reservations')
            ->firstOrFail();
    }
}
