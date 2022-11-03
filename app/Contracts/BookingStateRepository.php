<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Http\Requests\Backend\StatusBookingRequest;

interface BookingStateRepository
{
    public function handle(StatusBookingRequest $request);
}
