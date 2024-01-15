<?php

namespace App\Services\Product\Actions;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ProductOwnerException;
use App\Exceptions\ProductNotFoundException;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;

class ProductDeleteAction
{
    public function __construct(
        public readonly ProductWriteRepositoryInterface $productWriteRepository
    ) {
    }

    public function run($id)
    {

        $userId = Auth::id();
        $product = Product::query()
            ->where('id', $id)
            ->first();

        if (is_null($product)) {

            throw new ProductNotFoundException();
        }
        if ($product->user_id !== $userId) {
            throw new ProductOwnerException();
        }

        return $this->productWriteRepository->delete($id);
    }
}
