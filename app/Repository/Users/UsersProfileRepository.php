<?php

declare(strict_types=1);

namespace App\Repository\Users;

use App\Contracts\UpdateUserRepositoryInterface;
use App\Models\Client;
use App\Models\User;
use App\Traits\HasUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UsersProfileRepository implements UpdateUserRepositoryInterface
{
    use HasUpload;

    public function updated(string $key, $request): RedirectResponse
    {
        $user = User::query()
            ->where('id', '=', $key)
            ->first();
        $client = Client::query()
            ->where('user_id', '=', $user->id)
            ->first();
        $this->updateClient($client, $request);
        $user->update([
            'email' => $request->input('email'),
            'name' => $request->input('username'),
            'images' => self::uploadFiles($request),
            'password' => Hash::make($request->input('password')),
        ]);

        return back();
    }

    private function createClient($user, $request): void
    {
        Client::query()
            ->create([
                'user_id' => $user->id,
                'name' => $request->input('username'),
                'email' => $request->input('email'),
            ]);
    }

    private function updateClient($client, $request)
    {
        $client->update([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'images' => self::uploadFiles($request),
        ]);
    }
}
