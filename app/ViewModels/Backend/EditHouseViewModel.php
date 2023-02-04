<?php

declare(strict_types=1);

namespace App\ViewModels\Backend;

use App\Http\Controllers\Backend\Apartments\ApartmentAdminController;
use App\Models\Category;
use App\Models\House;
use App\Models\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\ViewModels\ViewModel;

class EditHouseViewModel extends ViewModel
{
    public string|null $indexUrl = null;
    public string $updateUrl;

    public function __construct(
        public string|int $house
    ) {
        $this->indexUrl = action([ApartmentAdminController::class, 'index']);
        $this->updateUrl = action([ApartmentAdminController::class, 'update'], $this->house);
    }

    public function house(): Model|Builder|House|null
    {
        return House::query()
            ->where('id', '=', $this->house)
            ->first();
    }

    public function types(): Collection|array
    {
        return Type::query()
            ->latest()
            ->get();
    }

    public function categories(): Collection|array
    {
        return Category::query()
            ->latest()
            ->get();
    }
}
