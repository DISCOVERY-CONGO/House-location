<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\SlideRepositoryInterface;
use App\Forms\SlideForm;
use App\Http\Requests\SlideRequest;
use App\Services\FlashMessageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class SlideAdminController extends BaseBackendController
{
    public function __construct(
        public FormBuilder $builder,
        public SlideRepositoryInterface $repository,
        public FlashMessageService $service
    ) {
        parent::__construct($this->service);
    }

    public function index(): Renderable
    {
        $sliders = $this->repository->getContents();

        return view('backend.domain.slides.index', compact('sliders'));
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(SlideForm::class, [
            'method' => 'POST',
            'url' => route('admins.slides.store'),
        ]);

        return view('backend.domain.slides.create', compact('form'));
    }

    public function store(SlideRequest $request): RedirectResponse
    {
        $this->repository->created(request: $request);

        $this->service->success(
            'success',
            'Un nouveau slide a ete ajouter'
        );

        return redirect()->route('admins.slides.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $slide = $this->repository->show(key: $key);

        $form = $this->builder->create(SlideForm::class, [
            'method' => 'PUT',
            'url' => route('admins.slides.update', $slide->id),
            'model' => $slide,
        ]);

        return view('backend.domain.slides.create', compact('form', 'slide'));
    }

    public function update(SlideRequest $request, string $key): RedirectResponse
    {
        $this->repository->updated(key: $key, request: $request);

        $this->service->success(
            'success',
            'Un slide a ete motifier'
        );

        return redirect()->route('admins.slides.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted($key);

        $this->service->success(
            'success',
            'Un slide a ete supprimer'
        );

        return back();
    }
}
