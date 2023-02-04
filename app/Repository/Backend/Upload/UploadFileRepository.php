<?php

declare(strict_types=1);

namespace App\Repository\Backend\Upload;

use App\Http\Requests\UploadFileRequest;
use App\Models\TemporaryImage;
use App\Traits\HasUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UploadFileRepository
{
    use HasUpload;

    public function upload(UploadFileRequest $request): Model|Builder
    {
        return TemporaryImage::query()
            ->create([
                'user_id' => auth()->id(),
                'file' => self::uploadPreview($request),
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
