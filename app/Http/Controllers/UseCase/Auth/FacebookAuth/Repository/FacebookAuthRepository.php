<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\FacebookAuth\Repository;

use App\Http\Controllers\UseCase\Auth\FacebookAuth\Exceptions\RedirectException;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Interfaces\FacebookAuthRepositoryInterface;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Socialite;

class FacebookAuthRepository implements FacebookAuthRepositoryInterface
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function authToFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $facebookId = User::query()
                ->where('facebook_id', '=', $user->id)
                ->first();

            if ($facebookId) {
                Auth::login($facebookId);
            } else {
                $createUser = User::query()
                    ->create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'password' => Hash::make($user->name),
                        'role_id' => 1
                    ]);

                Auth::login($createUser);
            }
            return route('users.users.index');
        } catch (RedirectException $exception) {
        }
    }
}
