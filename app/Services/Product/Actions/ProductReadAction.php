<?php

namespace App\Services\Product\Actions;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Product\Read\ProductReadRepositoryInterface;

class ProductReadAction
{
    private ProductReadRepositoryInterface $productRepository;

    public function __construct(ProductReadRepositoryInterface $productReadRepository)
    {
        $this->productRepository = $productReadRepository;
    }

    public function run($user): Collection|array
    {
        return $this->productRepository->read($user->id);
    }
}
