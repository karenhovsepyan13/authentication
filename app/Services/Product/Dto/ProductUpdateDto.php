<?php

namespace App\Services\Product\Dto;

use Spatie\LaravelData\Data;
use App\Http\Requests\ProductRequest\ProductUpdateRequest;

class ProductUpdateDto extends Data
{
    public string $name;
    public int $price;
    public string $country;
    public string $count;

    public static function fromRequest(ProductUpdateRequest $request): ProductUpdateDto
    {
        return self::from([
            'name' => $request->getName(),
            'price' => $request->getPrice(),
            'country' => $request->getCountry(),
            'count' => $request->getCount(),
        ]);
    }
}
