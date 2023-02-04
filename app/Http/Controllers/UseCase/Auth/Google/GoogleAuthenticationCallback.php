<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\Google;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UseCase\Contract\SocialAuthenticationCallbackInterface;

class GoogleAuthenticationCallback extends Controller
{
    public function __invoke(SocialAuthenticationCallbackInterface $googleAuthenticationCallbackRepository)
    {
        return $googleAuthenticationCallbackRepository->authToSocialNetwork();
    }
}
