<?php

declare(strict_types=1);

namespace App\Repository\Apps;

use App\Contracts\HomeRepositoryInterface;
use App\Enums\HouseEnum;
use App\Models\House;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class HomeFrontendRepository implements HomeRepositoryInterface
{
    public function getContent(): LengthAwarePaginator
    {
        return House::query()
            ->orderByDesc('created_at')
            ->when('status', fn ($builder) => $builder->where('status', HouseEnum::VALIDATED_HOUSE))
            ->inRandomOrder()
            ->paginate(8);
    }
}
