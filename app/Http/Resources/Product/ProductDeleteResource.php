<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDeleteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'message' => $this->getMessage(),
        ];
    }

    private function getMessage(): string
    {
        return $this['message'] ?? 'Product deleted successfully';
    }
}
