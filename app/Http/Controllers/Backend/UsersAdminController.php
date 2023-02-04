<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\UserRepositoryInterface;
use App\Services\FlashMessageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class UsersAdminController extends BaseBackendController
{
    public function __construct(
        protected readonly UserRepositoryInterface $repository,
        public FlashMessageService $service
    ) {
        parent::__construct($this->service);
    }

    public function index(): Renderable
    {
        $users = $this->repository->getContents();

        return view('backend.domain.users.index', compact('users'));
    }

    public function show(string $key): Renderable
    {
        $user = $this->repository->show(key: $key);

        return view('backend.domain.users.show', compact('user'));
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted(key:  $key);

        $this->service->success(
            'success',
            'Une un gestionnaire supprimer avec success'
        );

        return back();
    }
}
