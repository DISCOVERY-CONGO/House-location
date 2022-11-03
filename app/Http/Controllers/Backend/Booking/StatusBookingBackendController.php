<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Booking;

use App\Contracts\BookingStateRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StatusBookingRequest;
use Illuminate\Http\JsonResponse;

class StatusBookingBackendController extends Controller
{
    public function __construct(
        public BookingStateRepository $repository
    ) {
    }

    public function __invoke(StatusBookingRequest $request): JsonResponse
    {
        $booking = $this->repository->handle($request);

        return response()->json([
            'success' => 'Action executez avec success',
            'booking' => $booking,
        ]);
    }
}
