<?php

declare(strict_types=1);

namespace App\Repository\Backend\House;

use App\Contracts\ImageRepositoryInterface;
use App\Traits\HasUpload;
use App\Traits\ImageCrud;

class ImageRepository implements ImageRepositoryInterface
{
    use HasUpload;
    use ImageCrud;
}
