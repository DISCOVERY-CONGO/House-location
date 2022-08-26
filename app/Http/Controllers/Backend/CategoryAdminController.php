<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\CategoryRepositoryInterface;
use App\Forms\CategoryForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class CategoryAdminController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public CategoryRepositoryInterface $repository
    ) {
    }

    public function index(): Factory|View|Application
    {
        $categories = $this->repository->getContents();

        return view('backend.domain.category.index', compact('categories'));
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(CategoryForm::class, [
            'method' => 'POST',
            'url' => route('admins.categories.store'),
        ]);

        return view('backend.domain.category.create', compact('form'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->repository->created($request);

        return redirect()->route('admins.categories.index');
    }

    public function edit(string $id): Factory|View|Application
    {
        $category = $this->repository->getElementByKey($id);

        $form = $this->builder->create(CategoryForm::class, [
            'method' => 'PUT',
            'url' => route('admins.categories.update', $category->id),
            'model' => $category,
        ]);

        return view('backend.domain.category.create', compact('form', 'category'));
    }

    public function update(CategoryRequest $request, string $key): RedirectResponse
    {
        $this->repository->updated($key, $request);

        return redirect()->route('admins.categories.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted($key);

        return back();
    }
}
