<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Apartments;

use App\Contracts\ActiveApartmentRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActiveRoom;
use Illuminate\Http\JsonResponse;

class StatusApartmentController extends Controller
{
    public function __construct(
        public ActiveApartmentRepositoryInterface $repository
    ) {
    }

    public function __invoke(ActiveRoom $activeRoom): JsonResponse
    {
        $room = $this->repository->handle($activeRoom);

        return response()->json([
            'success' => 'Action executez avec success',
            'room' => $room,
        ]);
    }
}
