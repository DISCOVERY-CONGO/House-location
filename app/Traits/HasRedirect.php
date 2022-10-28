<?php

declare(strict_types=1);

namespace App\Traits;

use App\Enums\UserRoleEnum;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

trait HasRedirect
{
    protected string $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(): string
    {
        switch (Auth::user()->role_id) {
            case UserRoleEnum::ADMINS_ROLE:
                $this->redirectTo = route('admins.backend.index');

                return $this->redirectTo;
                break;
            case UserRoleEnum::DEALER_ROLE:
                $this->redirectTo = route('commissioner.backend.index');

                return $this->redirectTo;
                break;
            case UserRoleEnum::USERS_ROLE:
                $this->redirectTo = route('users.users.index');

                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = route('login');

                return $this->redirectTo;
        }
    }
}
