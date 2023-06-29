<?php

namespace App\Actions\Star;

use App\Dto\StarDto;
use App\Models\Star;

class StoreStar
{
    public static function handle(StarDto $dto, string $image): Star
    {
        return Star::create([
            'first_name'  => $dto->firstName,
            'last_name'   => $dto->lastName,
            'description' => $dto->description,
            'image'       => $image,
        ]);
    }
}
