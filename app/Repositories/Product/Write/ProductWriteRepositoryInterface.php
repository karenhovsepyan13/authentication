<?php

namespace App\Repositories\Product\Write;

use App\Models\Product;

interface ProductWriteRepositoryInterface
{
    public function create(array $data): Product;

    public function update(array $data, int $id): Product;

    public function delete(int $id): void;
}
