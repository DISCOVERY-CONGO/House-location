<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\FacebookAuth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Interfaces\FacebookAuthRepositoryInterface;

class FacebookAuthenticationController extends Controller
{
    public function __invoke(FacebookAuthRepositoryInterface $repository)
    {
        return $repository->redirectToFacebook();
    }
}
