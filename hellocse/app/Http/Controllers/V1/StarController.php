<?php

namespace App\Http\Controllers\V1;

use App\Actions\Star\DeleteStar;
use App\Actions\Star\StoreStar;
use App\Actions\Star\UpdateStar;
use App\Dto\StarDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Star\StoreStarRequest;
use App\Http\Requests\V1\Star\UpdateStarRequest;
use App\Http\Resources\V1\Star\StarCollection;
use App\Http\Resources\V1\Star\StarResource;
use App\Models\Star;
use App\Services\ImageService;
use Illuminate\Http\Response;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): StarCollection
    {
        $stars = Star::query()->get();
        return new StarCollection($stars);
    }

    public function show(string $id): StarResource
    {
        $star = Star::query()->findOrFail($id);
        return new StarResource($star);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStarRequest $request): StarResource
    {
        $image = ImageService::storeImageFromRequest($request);
        $starDto = StarDto::make($request);
        $star = StoreStar::handle($starDto, $image);

        return new StarResource($star);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStarRequest $request, string $id): StarResource
    {
        $star = Star::query()->findOrFail($id);
        if (!is_null($request->image)) {
            ImageService::updateStarImage($star, $request);
        }

        $starDto = StarDto::make($request);
        $star = UpdateStar::handle($starDto, intval($id));

        return new StarResource($star);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        $result = DeleteStar::handle(intval($id));
        return response($result);
    }
}
