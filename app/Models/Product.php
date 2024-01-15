<?php

namespace App\Models;

use App\Services\Product\Dto\ProductCreateDto;
use App\Services\Product\Dto\ProductUpdateDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public static function createProduct(ProductCreateDto $dto): array
    {
        $user = auth()->user();
        return [
            'user_id' => $user->id,
            'name' => $dto->name,
            'price' => $dto->price,
            'country' => $dto->country,
            'count' => $dto->count
        ];
    }

    public function updateProduct(ProductUpdateDto $dto): void
    {
        $user = auth()->user();
        $this->fill([
            'user_id' => $user->id,
            'name' => $dto->name,
            'price' => $dto->price,
            'country' => $dto->country,
            'count' => $dto->count
        ]);
        $this->save();
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
