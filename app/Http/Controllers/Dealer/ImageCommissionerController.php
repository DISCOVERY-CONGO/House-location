<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dealer;

use App\Contracts\ImageCommissionerRepositoryInterface;
use App\Http\Controllers\Backend\BaseBackendController;
use App\Http\Requests\ImageRequest;
use App\Services\FlashMessageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class ImageCommissionerController extends BaseBackendController
{
    public function __construct(
        protected readonly ImageCommissionerRepositoryInterface $repository,
        public FormBuilder $builder,
        public FlashMessageService $service
    ) {
        parent::__construct($this->service);
    }

    public function index(): Renderable
    {
        $images = $this->repository->getImages();

        return view('dealers.domain.images.index', compact('images'));
    }

    public function create(): Renderable
    {
        return view('dealers.domain.images.create');
    }

    public function store(ImageRequest $attributes): RedirectResponse
    {
        $this->repository->created(attributes: $attributes);

        $this->service->success(
            'success',
            'une nouvelle photo ajouter a la maison'
        );

        return to_route('commissioner.imageHouses.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted(key: $key);

        $this->service->success(
            'success',
            'une photo supprimer avec success'
        );

        return back();
    }
}
