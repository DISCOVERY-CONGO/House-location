<?php

declare(strict_types=1);

namespace App\Repository\Dealer\Uploader;

use App\Http\Requests\UploadImagesRequest;
use App\Models\TemporaryImage;
use App\Traits\HasUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ImagesUploaderRepository
{
    use HasUpload;

    public function upload(UploadImagesRequest $request): Model|Builder
    {
        return TemporaryImage::query()
            ->create([
                'user_id' => auth()->id(),
                'file' => self::uploadFile($request)
            ]);
    }

    public function removeFile(Request $request): Model|Builder|null
    {
        $temporary = json_decode($request->getContent());
        $image = TemporaryImage::query()
            ->where('id', '=', $temporary->id)
            ->first();
        $this->removePreview($image);
        $image->delete();
        return $image;
    }
}
