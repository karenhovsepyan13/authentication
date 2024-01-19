<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        $productId = $this->getId();

        return $this->user()->can('delete', [Product::class, $productId]);
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }

    public function getId(): int
    {
        return $this->route('id');
    }
}
