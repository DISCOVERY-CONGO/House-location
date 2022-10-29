<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Http\Requests\ActiveRoom;

interface ActiveApartmentRepositoryInterface
{
    public function handle(ActiveRoom $activeRoom);
}
