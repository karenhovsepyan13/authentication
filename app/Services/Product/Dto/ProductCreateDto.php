<?php

namespace App\Services\Product\Dto;

use Spatie\LaravelData\Data;
use App\Http\Requests\ProductRequest\ProductCreateRequest;

class ProductCreateDto extends Data
{
    public string $name;
    public int $price;
    public string $country;
    public string $count;

    public static function fromRequest(ProductCreateRequest $request): ProductCreateDto
    {
        return self::from([
            'name' => $request->getName(),
            'price' => $request->getPrice(),
            'country' => $request->getCountry(),
            'count' => $request ->getCount()
        ]);
    }
}
