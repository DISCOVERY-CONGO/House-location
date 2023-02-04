<?php

declare(strict_types=1);

namespace App\Http\Controllers\UseCase\Auth\FacebookAuth\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectException extends Exception
{
}
