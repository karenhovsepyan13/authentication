<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductUpdateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $request->route('product_id'),
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'country' => $this->resource->country,
            'count' => $this->resource->count,
        ];
    }
}
