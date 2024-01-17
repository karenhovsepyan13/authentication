<?php

namespace App\Repositories\Product\Write;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductWriteRepository implements ProductWriteRepositoryInterface
{
    public function create(array $data): Product
    {
        /* @var Product */
        return $this->query()->create($data);
    }

    public function update(array $data, int $id): Product
    {
        $this->query()->where('id', $id)->update($data);

        /* @var Product */
        return $this->query()->find($id);
    }

    public function delete(int $id): void
    {
        $this->query()->where('id', $id)->delete();
    }

    private function query(): Builder
    {
        return Product::query();
    }
}
