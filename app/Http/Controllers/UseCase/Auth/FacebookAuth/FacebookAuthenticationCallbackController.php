<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\FacebookAuth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UseCase\Auth\FacebookAuth\Interfaces\FacebookAuthRepositoryInterface;

final class FacebookAuthenticationCallbackController extends Controller
{
    public function __invoke(FacebookAuthRepositoryInterface $repository)
    {
        return $this->repository->redirectToFacebook();
    }
}
