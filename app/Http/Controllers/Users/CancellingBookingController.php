<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Contracts\CancelBookingRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CancellingBookingController extends Controller
{
    public function __construct(public CancelBookingRepositoryInterface $repository)
    {
    }

    public function cancel(string $key): RedirectResponse
    {
        $this->repository->cancelReservation(key: $key);

        return back();
    }
}
