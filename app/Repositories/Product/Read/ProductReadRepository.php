<?php

namespace App\Repositories\Product\Read;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\ProductNotFoundException;
use App\Exceptions\ProductNotExistException;
use Illuminate\Database\Eloquent\Collection;

class ProductReadRepository implements ProductReadRepositoryInterface
{
    public function getByUserId($userId): Collection
    {
        $products = $this->query()
            ->where('user_id', $userId)
            ->get();

        if ($products->isEmpty()) {
            throw new ProductNotExistException();
        }

        return $products;
    }

    public function getByIdAndUserId(int $id, int $userId): Product
    {
        /* @var Product $product */
        $product = $this->query()
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$product) {
            throw new ProductNotFoundException();
        }

        return $product;
    }

    private function query(): Builder
    {
        return Product::query();
    }
}
