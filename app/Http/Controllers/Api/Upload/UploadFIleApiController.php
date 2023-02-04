<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Upload;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use App\Repository\Backend\Upload\UploadFileRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UploadFIleApiController extends Controller
{
    public function __construct(
        protected readonly UploadFileRepository $repository
    ) {
    }

    public function __invoke(UploadFileRequest $request): Model|Builder
    {
        return $this->repository->upload($request);
    }

    public function destroy(Request $request): Model|Builder|null
    {
        return $this->repository->removeFile($request);
    }
}
