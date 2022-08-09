<?php
declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Contracts\SearchRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchLocationController extends Controller
{
    public function __construct(public SearchRepositoryInterface $repository){}

    public function searching(Request $request): JsonResponse
    {
        $searches = $this->repository->search(request:  $request);
        if ($searches->isNotEmpty()){
            $result = view('frontend.components._render', [
                'searches' => $searches
            ])->render();
            return response()->json([
                'success' => true,
                'search' => $result
            ]);
        }
        $empty = view('frontend.components._empty')->render();
        return response()->json([
            'success' => false,
            'empty' => $empty
        ]);
    }
}