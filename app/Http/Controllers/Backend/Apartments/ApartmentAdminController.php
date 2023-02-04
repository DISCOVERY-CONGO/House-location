<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Apartments;

use App\Contracts\ApartmentRepositoryInterface;
use App\Forms\ApartmentForm;
use App\Http\Controllers\Backend\BaseBackendController;
use App\Http\Requests\ApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Services\FlashMessageService;
use App\ViewModels\Backend\EditHouseViewModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class ApartmentAdminController extends BaseBackendController
{
    public function __construct(
        public FormBuilder $builder,
        protected readonly ApartmentRepositoryInterface $repository,
        public FlashMessageService $service
    ) {
        parent::__construct($this->service);
    }

    public function index(): Renderable
    {
        $rooms = $this->repository->getContents();

        return view('backend.domain.apartments.index', compact('rooms'));
    }

    public function show(string $key): Factory|View|Application
    {
        $room = $this->repository->show(key: $key);

        return view('backend.domain.apartments.show', compact('room'));
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(ApartmentForm::class, [
            'method' => 'POST',
            'url' => route('admins.houses.store'),
        ]);

        return view('backend.domain.apartments.create', compact('form'));
    }

    public function store(ApartmentRequest $request): RedirectResponse
    {
        $this->repository->created(attributes: $request);

        $this->service->success(
            type: 'success',
            messages: 'Une nouvelle maison a ete ajouter'
        );

        return to_route('admins.houses.index');
    }

    public function edit(string|int $key): Factory|View|Application
    {
        $viewModel = new EditHouseViewModel($key);

        return view('backend.domain.apartments.edit', compact('viewModel'));
    }

    public function update(UpdateApartmentRequest $request, string $key): RedirectResponse
    {
        $this->repository->updated(key: $key, attributes: $request);

        $this->service->success(
            type: 'success',
            messages: 'Une maison a ete modifier'
        );

        return to_route('admins.houses.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted($key);

        $this->service->success(
            type: 'success',
            messages: 'Une maison a ete supprimer'
        );

        return to_route('admins.houses.index');
    }
}
