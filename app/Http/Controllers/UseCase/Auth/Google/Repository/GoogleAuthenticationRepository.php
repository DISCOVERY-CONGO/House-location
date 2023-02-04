<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\Google\Repository;

use App\Http\Controllers\UseCase\Contract\SocialAuthenticationInterface;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleAuthenticationRepository implements SocialAuthenticationInterface
{
    public function redirectToSocialNetwork(): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }
}
