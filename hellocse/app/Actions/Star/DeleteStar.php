<?php

namespace App\Actions\Star;

use App\Models\Star;

class DeleteStar
{
    public static function handle(int $id): bool
    {
        $star = Star::query()->findOrFail($id);

        return $star->delete();
    }
}
