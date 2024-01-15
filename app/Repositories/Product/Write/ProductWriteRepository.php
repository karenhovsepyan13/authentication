<?php

namespace App\Repositories\Product\Write;

use App\Exceptions\ProductNotFoundException;
use App\Exceptions\ProductOwnerException;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    public function query(): Builder
    {
        return Product::query();
    }

    public function create($product): Product
    {
        /* @var Product $user */
        $user = Product::query()->create($product);

        return $user;
    }

    public function update(array $data, int $id): int
    {
        $product = Product::query()->where('id', $id)->first();
        if (!$product) {
            throw new ProductNotFoundException();
        }

        if (Auth::id() !== $product->user_id) {
            throw new ProductOwnerException();
        }
        return $this->query()->where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->query()->where('id', $id)->delete();
    }
}
