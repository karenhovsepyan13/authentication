<?php

namespace App\Repositories\Product\Write;


interface ProductWriteRepositoryInterface
{
    public function create($product);

    public function update(array $data, int $id);

    public function delete(int $id);
}
