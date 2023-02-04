<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\Google;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UseCase\Contract\SocialAuthenticationInterface;

class GoogleAuthentication extends Controller
{
    public function __invoke(SocialAuthenticationInterface $googleAuthentication)
    {
        return $googleAuthentication->redirectToSocialNetwork();
    }
}
