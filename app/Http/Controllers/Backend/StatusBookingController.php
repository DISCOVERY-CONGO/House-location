<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\Backend\Booking\BookingConfirmationRepository;
use Illuminate\Http\RedirectResponse;

class StatusBookingController extends Controller
{
    public function confirm(string $request): RedirectResponse
    {
        $this->repository->confirmed($request);

        return back();
    }
}
