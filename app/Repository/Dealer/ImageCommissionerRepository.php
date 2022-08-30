<?php

declare(strict_types=1);

namespace App\Repository\Dealer;

use App\Contracts\ImageCommissionerRepositoryInterface;
use App\Models\House;
use App\Models\Image;
use App\Models\User;
use App\Services\ToastService;
use App\Traits\ImageCrud;
use App\Traits\ImageUploader;
use Illuminate\Support\Collection;

class ImageCommissionerRepository implements ImageCommissionerRepositoryInterface
{
    use ImageUploader, ImageCrud;

    public function __construct(public ToastService $service)
    {
    }

    public function getImages(): Collection
    {
        return Image::query()
            ->select([
                'house_id',
                'id',
                'user_id'
            ])
            ->where('user_id', '=', auth()->id())
            ->with([
                'user',
                'houses'
            ])
            ->orderByDesc('created_at')
            ->get();
    }
}
