<?php

namespace App\Services\Product\Dto;

use Spatie\LaravelData\Data;
use App\Http\Requests\Product\ProductCreateRequest;

class ProductCreateDto extends Data
{
    public int $userId;
    public string $name;
    public int $price;
    public string $country;
    public int $count;

    public static function fromRequest(ProductCreateRequest $request): ProductCreateDto
    {
        return self::from([
            'userId' => $request->getUserId(),
            'name' => $request->getName(),
            'price' => $request->getPrice(),
            'country' => $request->getCountry(),
            'count' => $request->getCount()
        ]);
    }
}
