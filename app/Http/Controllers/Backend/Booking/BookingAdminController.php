<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Booking;

use App\Contracts\BookingRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class BookingAdminController extends Controller
{
    public function __construct(public BookingRepositoryInterface $repository)
    {
    }

    public function index(): Renderable
    {
        $reservations = $this->repository->getContents();

        return view('backend.domain.reservations.index', compact('reservations'));
    }

    public function show(string $key): Renderable
    {
        $reservation = $this->repository->show(key:  $key);

        return view('backend.domain.reservations.show', compact('reservation'));
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->deleted(key: $key);

        return back();
    }
}
