<?php

namespace App\Services\Product\Actions;

use App\Events\Product\ProductCreatedEvent;
use App\Models\Product;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;
use App\Services\Product\Dto\ProductCreateDto;

class ProductCreateAction
{
    public function __construct(
        private readonly ProductWriteRepositoryInterface $productWriteRepository
    ) {
    }

    public function run(ProductCreateDto $dto): Product
    {
        $product = Product::createProductData($dto);
        $createdProduct = $this->productWriteRepository->create($product);

        ProductCreatedEvent::dispatch($createdProduct);

        return $createdProduct;
    }
}
