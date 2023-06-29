<?php

namespace App\Actions\Star;

use App\Dto\StarDto;
use App\Models\Star;

class UpdateStar
{
    public static function handle(StarDto $dto, int $id): Star
    {
        $star = Star::query()->findOrFail($id);

        $star->first_name = $dto->firstName;
        $star->last_name = $dto->lastName;
        $star->description = $dto->description;

        $star->save();
        return $star;
    }
}
