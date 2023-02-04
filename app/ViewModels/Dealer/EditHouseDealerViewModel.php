<?php

declare(strict_types=1);

namespace App\ViewModels\Dealer;

use App\Http\Controllers\Dealer\ApartmentCommissionerController;
use App\Models\Category;
use App\Models\Detail;
use App\Models\House;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Category_C;
use LaravelIdea\Helper\App\Models\_IH_Detail_QB;
use LaravelIdea\Helper\App\Models\_IH_House_QB;
use LaravelIdea\Helper\App\Models\_IH_Type_C;
use Spatie\ViewModels\ViewModel;

class EditHouseDealerViewModel extends ViewModel
{
    public string|null $indexUrl = null;

    public string $updateUrl;

    public function __construct(
        public string|int $house
    ) {
        $this->indexUrl = action([ApartmentCommissionerController::class, 'index']);
        $this->updateUrl = action([ApartmentCommissionerController::class, 'update'], $this->house);
    }

    public function house(): Model|_IH_House_QB|Builder|House|null
    {
        return House::query()
            ->find($this->house);
    }

    public function detail(): Model|Builder|Detail|_IH_Detail_QB|null
    {
        return Detail::query()
            ->where('house_id', '=', $this->house)
            ->first();
    }

    public function types(): Collection|_IH_Type_C|array
    {
        return Type::query()
            ->latest()
            ->get();
    }

    public function categories(): _IH_Category_C|Collection|array
    {
        return Category::query()
            ->latest()
            ->get();
    }
}
