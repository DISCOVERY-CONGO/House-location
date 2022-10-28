<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\HasRedirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers, HasRedirect;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
