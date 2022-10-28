<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\Backend\Booking\CancelBookingRepository;
use Illuminate\Http\RedirectResponse;

class CancelBookingController extends Controller
{
    public function __construct(protected CancelBookingRepository $repository)
    {
    }

    public function inactive(string $request): RedirectResponse
    {
        $this->repository->inactive($request);

        return back();
    }
}
