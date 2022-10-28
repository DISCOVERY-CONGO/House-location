<?php

declare(strict_types=1);

namespace App\Repository\Backend;

use App\Contracts\SlideRepositoryInterface;
use App\Http\Requests\SlideRequest;
use App\Models\Slider;
use App\Services\FlashMessageService;
use App\Traits\HasUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SlideRepository implements SlideRepositoryInterface
{
    use HasUpload;

    public function __construct(protected FlashMessageService $service)
    {
    }

    public function getContents(): Collection|array
    {
        return Slider::query()
            ->select([
                'id',
                'title',
                'images',
                'description',
            ])
            ->orderByDesc('created_at')
            ->get();
    }

    public function show(string $key): Model|Builder
    {
        return Slider::query()
            ->select([
                'id',
                'title',
                'images',
                'description',
            ])
            ->where('id', '=', $key)
            ->firstOrFail();
    }

    public function created(SlideRequest $request): Model|Builder
    {
        $slide = Slider::query()
            ->create([
                'images' => self::uploadFiles($request),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        $this->service->success('Un nouveau slide a ete ajouter avec success');

        return $slide;
    }

    public function updated(string $key, SlideRequest $request): Model|Builder
    {
        $slide = Slider::query()
            ->where('id', '=', $key)
            ->firstOrFail();

        $this->removePathOfImages($slide);
        $slide->update([
            'title' => $request->input('title'),
            'images' => self::uploadFiles($request),
            'description' => $request->input('description'),
        ]);
        $this->service->success('Un slide a ete modifier avec success', 'success');

        return $slide;
    }

    public function deleted(string $key): Model|Builder
    {
        $slide = $this->show($key);
        $slide->delete();
        $this->service->success('Un slide a ete supprimer avec success', 'success');

        return $slide;
    }
}
