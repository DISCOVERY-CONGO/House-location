<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Contracts\BookingHouseRepositoryInterface;
use App\Http\Controllers\Backend\BaseBackendController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Services\FlashMessageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class BookingController extends BaseBackendController
{
    public function __construct(
        public BookingHouseRepositoryInterface $repository,
        public FlashMessageService $service
    )
    {
        parent::__construct($this->service);
    }

    public function store(ReservationRequest $request): RedirectResponse
    {
        $reservation = $this->repository->stored(attributes: $request);

        return redirect()->route('reservation.show', $reservation->id);
    }

    public function show(string $key): Renderable
    {
        $reservation = $this->repository->getReservation(key: $key);

        $this->service->success(
            'success',
            "Vous venez d'effectuer une reservation"
        );

        return view('frontend.domain.reservations.confirmed', compact('reservation'));
    }
}
