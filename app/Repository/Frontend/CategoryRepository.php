<?php

declare(strict_types=1);

namespace App\Repository\Frontend;

use App\Contracts\CategoryHomeRepositoryInterface;
use App\Enums\HouseEnum;
use App\Models\Category;
use App\Models\House;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryHomeRepositoryInterface
{
    public function index($request): array|Collection
    {
        $apartments = House::query()
            ->orderByDesc('created_at')
            ->when('status', fn ($builder) => $builder->where('status', HouseEnum::ACTIVATE))
            ->inRandomOrder();

        if ($request->input('category')) {
            $apartments->whereHas('categories', function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->input('category').'%');
            });
        }

        return $apartments->get();
    }

    public function show(string $key)
    {
        $house = House::query()
            ->when('id', fn ($builder) => $builder->where('id', $key))
            ->when('status', fn ($builder) => $builder->where('status', HouseEnum::ACTIVATE))
            ->withCount('reservations')
            ->first();

        return $house->load(['categories', 'image', 'type']);
    }

    public function getHouseByDetails($house): Collection|array
    {
        return House::query()
            ->when('status', fn ($builder) => $builder->where('status', HouseEnum::ACTIVATE))
            ->when('prices', fn ($builder) => $builder->where('prices', $house->prices))
            ->orWhere('commune', '=', $house->commune)
            ->get();
    }

    public function getHouseCategories(): Collection|array
    {
        return Category::query()
            ->select([
                'name',
                'id',
            ])
            ->latest()
            ->get();
    }
}
