<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Image;
use App\Models\TemporaryImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Image_QB;

trait ImageCrud
{
    use HasUpload;

    public function getContents(): Collection|array
    {
        return Image::query()
            ->select([
                'id',
                'images',
                'house_id',
                'user_id',
            ])
            ->with('houses')
            ->orderByDesc('created_at')
            ->get();
    }

    public function show(string $key): Model|Builder|null
    {
        return Image::query()
            ->where('id', '=', $key)
            ->first();
    }

    public function created($attributes): array|Collection|null
    {
        $temporary = $this->getTemporaryImages();
        if ($temporary) {
            foreach ($temporary as $item) {
                Image::query()
                    ->create([
                        'user_id' => auth()->id(),
                        'house_id' => $attributes->input('house'),
                        'images' => $item->file
                    ]);
            }
            $temporary->map(fn($builder) => $builder->delete());
            return $temporary;
        }
        return null;
    }

    public function deleted(string $key): Model|Builder|null
    {
        $image = $this->show(key: $key);
        $this->removePathOfImages($image) ?? null;
        $image->delete();
        return $image;
    }

    private function getTemporaryImages(): array|Collection
    {
        return TemporaryImage::query()
            ->where('user_id', '=', auth()->id())
            ->get();
    }
}
