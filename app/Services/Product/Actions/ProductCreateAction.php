<?php

namespace App\Services\Product\Actions;

use App\Models\Product;
use App\Services\Product\Dto\ProductCreateDto;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;

class ProductCreateAction
{
    public function __construct(private readonly ProductWriteRepositoryInterface $productWriteRepository)
    {
    }

    public function run(ProductCreateDto $dto)
    {
        $product = Product::createProduct($dto);
        return $this->productWriteRepository->create($product);
    }
}