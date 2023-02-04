<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\Google\Repository;


use App\Enums\UserRoleEnum;
use App\Http\Controllers\UseCase\Auth\Google\Exceptions\GoogleAuthenticationException;
use App\Http\Controllers\UseCase\Contract\SocialAuthenticationCallbackInterface;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthenticationCallbackRepository implements SocialAuthenticationCallbackInterface
{
    public function authToSocialNetwork(): RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->user();
            $googleUser = User::query()->where('email', '=',  $user->email)
                ->first();
            if (! $googleUser) {
                $createUser = User::query()
                    ->create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => Hash::make($user->name),
                        'role_id' => UserRoleEnum::USERS_ROLE,
                    ]);
                auth()->login($createUser, true);
                return redirect()->intended(route('home.index'));
            }
            auth()->login($googleUser, true);
            return redirect()->intended(route('home.index'));
        } catch (GoogleAuthenticationException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
    }
}
