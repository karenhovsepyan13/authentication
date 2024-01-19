<?php

namespace App\Policies\Product;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Repositories\Product\Read\ProductReadRepositoryInterface;

class ProductPolicy
{
    use HandlesAuthorization;

    public function __construct(
        private readonly ProductReadRepositoryInterface $productReadRepository
    ) {
    }

    public function update(User $user, int $productId): bool
    {
        $this->productReadRepository->getByIdAndUserId(
            $productId,
            $user->id
        );

        return true;
    }

    public function delete(User $user, int $productId): bool
    {
        $this->productReadRepository->getByIdAndUserId(
            $productId,
            $user->id
        );

        return true;
    }
}
