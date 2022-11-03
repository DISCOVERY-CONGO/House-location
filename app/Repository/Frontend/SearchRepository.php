<?php

declare(strict_types=1);

namespace App\Repository\Frontend;

use App\Contracts\SearchRepositoryInterface;
use App\Enums\HouseEnum;
use App\Models\House;
use Illuminate\Database\Eloquent\Collection;

class SearchRepository implements SearchRepositoryInterface
{
    public function search($request): Collection|array|null
    {
        if ($request->input('_search') !== null) {
            return House::query()
                ->when(
                    'status',
                    fn ($builder) => $builder->where('status', HouseEnum::ACTIVATE)
                )
                ->where('deleted_at', '=', null)
                ->whereHas('detail', function ($builder) use ($request) {
                    return $builder->where('number_rooms', 'LIKE', '%' . $request->input('_search') . '%')
                        ->orWhere('number_pieces', 'LIKE', '%' . $request->input('_search') . '%');
                })
                ->where('prices', 'like', '%' . $request->input('_search') . '%')
                ->orWhere('commune', 'like', '%' . $request->input('_search') . '%')
                ->orWhere('address', 'like', '%' . $request->input('_search') . '%')
                ->orWhere('district', 'like', '%' . $request->input('_search') . '%')
                ->orWhere('town', 'like', '%' . $request->input('_search') . '%')
                ->take(8)
                ->get([
                    'prices',
                    'warranty_price',
                    'commune',
                    'town',
                    'district',
                    'address',
                    'status',
                    'id',
                    'deleted_at'
                ]);
        }

        return null;
    }
}
