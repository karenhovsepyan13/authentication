<?php

namespace App\Services\Product\Actions;


use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Product\Dto\ProductUpdateDto;
use App\Repositories\Product\Read\ProductReadRepositoryInterface;
use App\Repositories\Product\Write\ProductWriteRepositoryInterface;

class ProductUpdateAction
{
    public function __construct(
        private readonly ProductWriteRepositoryInterface $productWriteRepository,
        private readonly ProductReadRepositoryInterface $productReadRepository,
    ) {
    }

    public function run(ProductUpdateDto $dto): array|Builder|Model
    {
        $product = $this->productReadRepository->getByIdAndUserId($dto->id, $dto->userId);
        $dataToUpdate = Product::updateProductData($dto);

        return $this->productWriteRepository->update($dataToUpdate, $product->id);
    }
}
