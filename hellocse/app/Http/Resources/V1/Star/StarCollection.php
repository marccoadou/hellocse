<?php

namespace App\Http\Resources\V1\Star;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StarCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
