<?php

namespace App\Dto;

use Illuminate\Foundation\Http\FormRequest;

class StarDto implements DataObjectContract
{

    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $description,
    ) {
    }

    public static function make(FormRequest $request): DataObjectContract
    {
        return new self(
            firstName  : strval($request->get(key: 'firstName')),
            lastName   : strval($request->get(key: 'lastName')),
            description: strval($request->get(key: 'description')),
        );
    }
}
