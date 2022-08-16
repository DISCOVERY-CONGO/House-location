<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dealer;

use App\Contracts\ApartmentCommissionerRepositoryInterface;
use App\Forms\ApartmentForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class ApartmentCommissionerController extends Controller
{
    public function __construct(
        public ApartmentCommissionerRepositoryInterface $repository,
        public FormBuilder $builder
    ) {
    }

    public function index(): Renderable
    {
        return view('dealers.pages.houses.index', [
            'houses' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        $room = $this->repository->show(key: $key);
        return view('dealers.pages.houses.show', compact('room'));
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(ApartmentForm::class, [
            'method' => 'POST',
            'url' => route('commissioner.houses.store')
        ]);
        return view('dealers.pages.houses.create', compact('form'));
    }

    public function store(ApartmentRequest $request): RedirectResponse
    {
        $this->repository->created(attributes: $request);
        return redirect()->route('commissioner.houses.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $room = $this->repository->show(key: $key);
        $form = $this->builder->create(ApartmentForm::class, [
            'method' => 'PUT',
            'url' => route('commissioner.houses.update', $room->key),
            'model' => $room
        ]);
        return view('dealers.pages.houses.create', compact('form', 'room'));
    }

    public function update(ApartmentRequest $request, string $key): RedirectResponse
    {
        $this->repository->updated(key: $key,attributes: $request);
        return redirect()->route('commissioner.houses.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted($key);
        return back();
    }
}
