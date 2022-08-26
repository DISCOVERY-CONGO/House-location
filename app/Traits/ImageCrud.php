<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait ImageCrud
{
    use ImageUploader;

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
        $image = new Image();
        foreach ($attributes->file('images') as $images) {
            $path = self::uploadMultiple($images);
            $image->images = json_encode($path);
        }
        $image->house_id = $attributes->input('house');
        $image->user_id = auth()->id();
        $image->save();

        $this->service->success('Images ajouter avec succes');

        return $image;
    }

    public function updated(string $key, $attributes): Model|Builder|null
    {
        $image = $this->show(key: $key);
        $this->removePathOfImages($image);
        $image->update([
            'images' => self::uploadFiles($attributes),
            'house_id' => $attributes->input('house_id'),
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
