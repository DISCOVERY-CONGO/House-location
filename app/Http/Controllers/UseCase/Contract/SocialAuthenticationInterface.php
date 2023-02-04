<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Contract;

interface SocialAuthenticationInterface
{
    public function redirectToSocialNetwork();
}
