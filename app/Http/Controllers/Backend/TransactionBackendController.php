<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Contracts\TransactionRepositoryInterface;
use App\Services\FlashMessageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionBackendController extends BaseBackendController
{
    public function __construct(
        protected readonly TransactionRepositoryInterface $repository,
        public FlashMessageService $service,
    ) {
        parent::__construct($this->service);
    }

    public function index(): Renderable
    {
        $transactions = $this->repository->getTransactions();

        return view('backend.domain.transactions.index', compact('transactions'));
    }

    public function show(int $key): Factory|View|Application
    {
        $transaction = $this->repository->showTransaction(key:  $key);

        return view('backend.domain.transactions.show', compact('transaction'));
    }

    public function destroy(int $key): RedirectResponse
    {
        $this->repository->deleteTransaction($key);

        $this->service->success(
            'success',
            'Une transaction a ete supprimer'
        );

        return back();
    }
}
