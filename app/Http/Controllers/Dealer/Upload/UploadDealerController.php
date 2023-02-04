<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dealer\Upload;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImagesRequest;
use App\Repository\Dealer\Uploader\Builder;
use App\Repository\Dealer\Uploader\ImagesUploaderRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UploadDealerController extends Controller
{
    public function __construct(
        protected readonly ImagesUploaderRepository $repository
    ) {
    }

    public function __invoke(UploadImagesRequest $request): Model|Builder
    {
        return $this->repository->upload($request);
    }

    public function destroy(Request $request): Model|Builder|null
    {
        return $this->repository->removeFile($request);
    }
}
