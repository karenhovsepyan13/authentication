<?php

namespace App\Services\Product\Actions;

use Illuminate\Http\Request;
use App\Services\Product\Dto\ProductUpdateDto;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;

class ProductUpdateAction
{
    public function __construct(
        protected ProductWriteRepositoryInterface $repository,
        protected Request $request
    ) {
    }

    public function run(ProductUpdateDto $dto)
    {
        $product_id = $this->request->route('product_id');
        $id = (int) $product_id;
        $product = $dto;

        return $this->repository->update($product->toArray(), $id);
    }
}
