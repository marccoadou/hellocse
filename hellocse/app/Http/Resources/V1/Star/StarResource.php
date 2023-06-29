<?php

namespace App\Http\Resources\V1\Star;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'starId'      => $this->id,
            'firstName'   => $this->first_name,
            'lastName'    => $this->last_name,
            'description' => $this->description,
            'imageUrl'    => $this->image
        ];
    }
}
