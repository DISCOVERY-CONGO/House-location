<?php

declare(strict_types=1);

namespace App\Repository\Backend;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getContents(): Collection
    {
        return Category::query()
            ->select([
                'id',
                'name',
            ])
            ->orderByDesc('created_at')
            ->get();
    }

    public function created($attributes): Model|Builder|Category
    {
        return Category::query()
            ->create([
                'name' => $attributes->name,
            ]);
    }

    public function getElementByKey(string $key): Model|Builder
    {
        return Category::query()
            ->where('id', '=', $key)
            ->firstOrFail();
    }

    public function updated(string $key, $attributes): Model|Builder
    {
        $category = $this->getElementByKey($key);
        $category->update([
            'name' => $attributes->name,
        ]);

        return $category;
    }

    public function deleted(string $key): Builder|Model
    {
        $category = $this->getElementByKey($key);
        $category->delete();

        return $category;
    }
}
