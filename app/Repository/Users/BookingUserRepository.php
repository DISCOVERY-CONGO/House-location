<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Contracts\BookingUserRepositoryInterface;
use App\Models\Client;
use App\Models\Reservation;
use http\Client\Curl\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookingUserRepository implements BookingUserRepositoryInterface
{
    public function getReservations(): LengthAwarePaginator
    {
        $user = \App\Models\User::query()
            ->where('id', '=', auth()->id())
            ->first();
        $client = Client::query()
            ->where('user_id', '=', $user->id)
            ->first();
        if ($client == null) {
            Client::query()
                ->create([
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'user_id' => $user->id
                ]);
        }
        return Reservation::query()
            ->select([
                'id',
                'client_id',
                'user_id',
                'house_id',
                'status',
            ])
            ->with([
                'house',
                'transaction',
            ])
            ->where('user_id', '=', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(6);
    }
}
