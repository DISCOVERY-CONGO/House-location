<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\FacebookAuth\Repository;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Exceptions\RedirectException;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Interfaces\FacebookAuthRepositoryInterface;
use App\Models\User;
use Auth;
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

            if (! $facebookId) {
                $createUser = User::query()
                    ->create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'password' => Hash::make($user->name),
                        'role_id' => UserRoleEnum::USERS_ROLE,
                    ]);
                Auth::login($createUser);
                return redirect()->intended(route('home.index'));
            }
            Auth::login($facebookId);
            return route('users.users.index');
        } catch (RedirectException $exception) {
        }
    }
}
