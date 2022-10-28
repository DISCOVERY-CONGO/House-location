<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repository\Backend\Booking\BookingChartRepository;
use Illuminate\Contracts\Support\Renderable;

class HomeAdminController extends Controller
{
    public function __construct(protected BookingChartRepository $repository)
    {
    }

    public function index(): Renderable
    {
        $confirmedReservation = $this->repository->getBookingConfirmed();
        $unconfirmedReservation = $this->repository->getBookingUnConfirmed();
        $notifications = auth()->user()->unreadNotifications();

        return view('backend.dashboard',
            compact('confirmedReservation', 'unconfirmedReservation', 'notifications'));
    }
}
