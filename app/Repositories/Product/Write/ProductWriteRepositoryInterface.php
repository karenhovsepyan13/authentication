<?php

namespace App\Repositories\Product\Write;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

interface ProductWriteRepositoryInterface
{
    public function create(array $data): Product;

    public function update(array $data, int $id): Product;

    public function delete(int $id): void;
}
