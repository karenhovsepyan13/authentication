<?php

namespace App\Services\Product\Dto;

use Spatie\LaravelData\Data;
use App\Http\Requests\Product\ProductUpdateRequest;

class ProductUpdateDto extends Data
{
    public ?int $id;
    public ?int $userId;
    public ?string $name;
    public ?int $price;
    public ?string $country;
    public ?int $count;

    public static function fromRequest(ProductUpdateRequest $request): ProductUpdateDto
    {
        return self::from([
            'id' => $request->getId(),
            'userId' => $request->getUserId(),
            'name' => $request->getName(),
            'price' => $request->getPrice(),
            'country' => $request->getCountry(),
            'count' => $request->getCount(),
        ]);
    }
}
