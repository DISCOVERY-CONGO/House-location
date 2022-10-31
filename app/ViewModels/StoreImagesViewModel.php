<?php

declare(strict_types=1);

namespace App\ViewModels;

use App\Http\Controllers\Backend\ImagesAdminController;
use App\Models\House;
use Illuminate\Database\Eloquent\Collection;
use LaravelIdea\Helper\App\Models\_IH_House_C;
use Spatie\ViewModels\ViewModel;

class StoreImagesViewModel extends ViewModel
{
    public string $storeUrl;
    public string $indexUrl;
    public function __construct()
    {
        $this->indexUrl = action([ImagesAdminController::class, 'index']);
        $this->storeUrl = action([ImagesAdminController::class, 'store']);
    }

    public function houses(): Collection|array|_IH_House_C
    {
        return House::query()
            ->latest()
            ->get([
                'id',
                'reference'
            ]);
    }
}
