<?php

namespace App\Repositories\Product\Read;

use App\Models\Product;
use App\Exceptions\ProductNotExistException;
use Illuminate\Database\Eloquent\Collection;

class ProductReadRepository implements ProductReadRepositoryInterface
{

    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function read($userId): Collection|array
    {
        $products = Product::query()->where('user_id', $userId)->get();

        if ($products->isEmpty()) {
            throw new ProductNotExistException();
        }

        return $products;
    }
}
