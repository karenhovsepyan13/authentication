<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Product\Dto\ProductCreateDto;
use App\Services\Product\Dto\ProductUpdateDto;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'country',
        'count'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function createProductData(ProductCreateDto $dto): array
    {
        return [
            'user_id' => $dto->userId,
            'name' => $dto->name,
            'price' => $dto->price,
            'country' => $dto->country,
            'count' => $dto->count
        ];
    }

    public static function updateProductData(ProductUpdateDto $dto): array
    {
        $data = [
            'name' => $dto->name,
            'price' => $dto->price,
            'country' => $dto->country,
            'count' => $dto->count,
        ];

        return array_filter($data);
    }
}
