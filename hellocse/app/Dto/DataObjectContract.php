<?php

namespace App\Dto;

use Illuminate\Foundation\Http\FormRequest;

interface DataObjectContract
{
    public static function make(
        FormRequest $request
    ): self;
}
