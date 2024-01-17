<?php

namespace App\Services\Product\Actions;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Product\Read\ProductReadRepositoryInterface;

class ProductIndexAction
{
    public function __construct(
        private readonly ProductReadRepositoryInterface $productReadRepository
    ) {
    }

    public function run(int $userId): Collection
    {
        return $this->productReadRepository->getByUserId($userId);
    }
}
