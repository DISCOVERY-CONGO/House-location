<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HasUpload
{
    public static function uploadFiles(Request $request): string
    {
        return $request->file('images')
            ->storePublicly('/', ['disk' => 'public']);
    }

    public static function uploadFile(Request $request): string
    {
        return $request->file('image')
            ->storePublicly('/', ['disk' => 'public']);
    }

    public static function uploadPreview(Request $request): string
    {
        return $request->file('file')
            ->storePublicly('/', ['disk' => 'public']);
    }

    public function removePreview($model): void
    {
        Storage::disk('public')
            ->delete($model->file);
    }

    public function removePathOfImages($model): void
    {
        Storage::disk('public')
            ->delete($model->images);
    }

    public static function uploadMultiple($images)
    {
        return $images->store('/images/', ['disk' => 'public']);
    }
}
