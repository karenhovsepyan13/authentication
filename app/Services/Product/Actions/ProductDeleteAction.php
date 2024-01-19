<?php

namespace App\Services\Product\Actions;

use App\Services\Product\Dto\ProductDeleteDto;
use App\Repositories\Product\Read\ProductReadRepositoryInterface;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;

class ProductDeleteAction
{
    public function __construct(
        private readonly ProductWriteRepositoryInterface $productWriteRepository,
        private readonly ProductReadRepositoryInterface $productReadRepository,
    ) {
    }

    public function run(ProductDeleteDto $dto): void
    {
        $product = $this->productReadRepository->getByIdAndUserId($dto->id, $dto->userId);

        $this->productWriteRepository->delete($product->id);
    }
}
