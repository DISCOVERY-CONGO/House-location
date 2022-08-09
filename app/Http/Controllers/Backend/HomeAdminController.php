<?php
declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class HomeAdminController extends Controller
{
    public function index(): Renderable
    {
        return view('backend.dashboard');
    }
}