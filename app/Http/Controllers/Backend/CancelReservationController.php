<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CancelReservationController extends Controller
{

    public function __construct(protected InactiveRepository $repository)
    {
    }

    public function inactive(string $request): RedirectResponse
    {
        $this->repository->inactive($request);

        return back();
    }
}
