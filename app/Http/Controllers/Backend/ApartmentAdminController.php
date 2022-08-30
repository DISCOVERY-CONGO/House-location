<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\ApartmentRepositoryInterface;
use App\Forms\ApartmentForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class ApartmentAdminController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public ApartmentRepositoryInterface $repository
    ) {
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

        return redirect()->route('admins.houses.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $room = $this->repository->show(key: $key);

        $form = $this->builder->create(ApartmentForm::class, [
            'method' => 'PUT',
            'url' => route('admins.houses.update', $room->id),
            'model' => $room,
        ]);

        return view('backend.domain.apartments.create', compact('form', 'room'));
    }

    public function update(UpdateApartmentRequest $request, string $key): RedirectResponse
    {
        $this->repository->updated(key: $key, attributes: $request);

        return redirect()->route('admins.houses.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted($key);

        return back();
    }
}
