<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dealer;

use App\Contracts\ImageCommissionerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class ImageCommissionerController extends Controller
{
    public function __construct(
        public ImageCommissionerRepositoryInterface $repository,
        public FormBuilder $builder
    ) {
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

        return redirect()->route('commissioner.imageHouses.index');
    }

    public function edit(string $key): Renderable
    {
        $image = $this->repository->show(key: $key);

        return view('dealers.domain.images.edit', compact('image'));
    }

    public function update(string $key, ImageRequest $attributes): RedirectResponse
    {
        $this->repository->updated(key: $key, attributes: $attributes);

        return redirect()->route('commissioner.imageHouses.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted(key: $key);

        return back();
    }
}
