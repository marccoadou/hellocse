<?php

namespace App\Services;

use App\Models\Star;
use Illuminate\Http\Request;

class ImageService
{

    public static function updateStarImage(Star $star, Request $request): string
    {
        $imageName = self::storeImageFromRequest($request);

        $star->image = $imageName;
        $star->save();

        return asset("images/stars/$imageName");
    }

    public static function storeImageFromRequest(Request $request): string
    {
        $imageName = self::getImageName($request);
        $request->image->move(public_path("images/stars/"), $imageName);
        return asset("images/stars/$imageName");
    }

    public static function getImageName(Request $request): string
    {
        return time() . '.' . $request->image->extension();
    }
}
