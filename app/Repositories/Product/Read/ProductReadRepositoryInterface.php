<?php

namespace App\Repositories\Product\Read;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductReadRepositoryInterface
{
    public function getByUserId($userId): Collection;

    public function getByIdAndUserId(int $id, int $userId): Product;
}
