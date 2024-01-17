<?php

namespace App\Services\Product\Dto;

use Spatie\LaravelData\Data;
use App\Http\Requests\Product\ProductDeleteRequest;

class ProductDeleteDto extends Data
{
    public int $id;
    public int $userId;

    public static function fromRequest(ProductDeleteRequest $request): ProductDeleteDto
    {
        return self::from([
            'id' => $request->getId(),
            'userId' => $request->getUserId(),
        ]);
    }
}