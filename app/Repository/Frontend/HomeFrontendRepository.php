<?php

declare(strict_types=1);

namespace App\Repository\Frontend;

use App\Contracts\HomeRepositoryInterface;
use App\Enums\HouseEnum;
use App\Models\House;
use App\Models\HouseNote;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class HomeFrontendRepository implements HomeRepositoryInterface
{
    public function getContent(): Collection|array
    {
        return House::query()
            ->orderByDesc('created_at')
            ->when(
                'status',
                fn ($builder) => $builder->where('status', HouseEnum::ACTIVATE)
            )
            ->with(['type', 'detail', 'categories'])
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function getAll(): Collection|array
    {
        return House::query()
            ->orderByDesc('created_at')
            ->when(
                'status',
                fn ($builder) => $builder->where('status', HouseEnum::ACTIVATE)
            )
            ->with(['type', 'detail', 'categories'])
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function getSliders(): Collection|array
    {
        return Slider::query()
            ->select([
                'id',
                'title',
                'images',
                'description',
            ])
            ->orderByDesc('created_at')
            ->get();
    }

    public function getHouseWithManyNotes(): array|Collection
    {
        return HouseNote::query()
            ->where('note', '>', 3)
            ->with('house', function ($query) {
                $query
                    ->where('status', HouseEnum::ACTIVATE);
            })
            ->orderByDesc('created_at')
            ->get();
    }

    public function showApartment(string $key): Model|Builder|House
    {
        $apartment = House::query()
            ->where('status', '=', HouseEnum::ACTIVATE)
            ->where('id', '=', $key)
            ->firstOrFail();

        return $apartment->load([
            'image',
            'detail',
            'categories',
            'type',
            'notes',
        ]);
    }
}
