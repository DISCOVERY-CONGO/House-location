<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    public function created($attributes): Model|Builder
    {
        $image = Image::query()
            ->create([
                'user_id' => auth()->id(),
                'house_id' => $attributes->input('house'),
                'images' => self::uploadFiles($attributes)
            ]);

        $this->service->success('Images ajouter avec succes');

        return $image;
    }

    public function updated(string $key, $attributes): Model|Builder|null
    {
        $image = $this->show(key: $key);

        $this->removePathOfImages($image);
        $image->update([
            'images' => self::uploadFiles($attributes),
            'house_id' => $attributes->input('house'),
        ]);
        $this->service->success('Images modifier avec succes');

        return $image;
    }

    public function deleted(string $key): Model|Builder|null
    {
        $image = $this->show(key: $key);
        $this->removePathOfImages($image);
        $image->delete();
        $this->service->success('images supprimer avec succes');

        return $image;
    }
}
