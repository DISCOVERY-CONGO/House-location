<?php

declare(strict_types=1);

namespace App\Repository\Dealer;

use App\Contracts\ImageCommissionerRepositoryInterface;
use App\Models\Image;
use App\Traits\HasUpload;
use App\Traits\ImageCrud;
use Illuminate\Support\Collection;

class ImageCommissionerRepository implements ImageCommissionerRepositoryInterface
{
    use HasUpload;
    use ImageCrud;

    public function getImages(): Collection
    {
        return Image::query()
            ->select([
                'house_id',
                'id',
                'user_id',
                'images',
            ])
            ->where('user_id', '=', auth()->id())
            ->with([
                'user',
                'houses',
            ])
            ->orderByDesc('created_at')
            ->get();
    }
}
