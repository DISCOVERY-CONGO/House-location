<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Contracts\SearchRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchLocationController extends Controller
{
    public function __construct(public SearchRepositoryInterface $repository)
    {
    }

    public function searching(Request $request): JsonResponse
    {
        if ($request->input('_search') == null) {
            return response()->json([
                'success' => false,
                'empty' => view('frontend.components.null')->render(),
            ]);
        }

        $searches = $this->repository->search(request:  $request);

        if ($searches->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'search' => view('frontend.components._render', [
                    'searches' => $searches,
                ])->render(),
            ]);
        }

        return response()->json([
            'success' => false,
            'empty' => view('frontend.components._empty')->render(),
        ]);
    }
}
