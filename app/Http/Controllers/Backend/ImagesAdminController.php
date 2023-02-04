<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\ImageRepositoryInterface;
use App\Http\Requests\ImageRequest;
use App\Services\FlashMessageService;
use App\ViewModels\StoreImagesViewModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

final class ImagesAdminController extends BaseBackendController
{
    public function __construct(
        protected readonly ImageRepositoryInterface $repository,
        public FlashMessageService $service
    ) {
        parent::__construct($this->service);
    }

    public function index(): Renderable
    {
        $images = $this->repository->getContents();

        return view('backend.domain.images.index', compact('images'));
    }

    public function create(): Renderable
    {
        $viewModel = new StoreImagesViewModel();

        return view('backend.domain.images.create', compact('viewModel'));
    }

    public function store(ImageRequest $attributes): RedirectResponse
    {
        $this->repository->created(attributes: $attributes);

        $this->service->success(
            'success',
            'Les images ajouter a la salle'
        );

        return redirect()->route('admins.image.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted(key: $key);

        $this->service->success(
            'success',
            'Les images  de la maison on ete supprimer'
        );

        return back();
    }
}
