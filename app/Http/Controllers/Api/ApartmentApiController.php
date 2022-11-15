<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Enums\HouseEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApartmentApiController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $outlets = House::query()
            ->where('status', '=', HouseEnum::ACTIVATE)
            ->get();

        $geoJSOData = $outlets->map(fn ($outlet) => [
            'type' => 'Feature',
            'properties' => new HouseResource($outlet),
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [
                    $outlet->longitude,
                    $outlet->latitude,
                ],
            ],
        ]);

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $geoJSOData,
        ]);
    }
}
