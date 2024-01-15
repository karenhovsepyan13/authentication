<?php

namespace App\Models;

use App\Services\Auth\Dto\UserDto\RegisterDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/* @property string $password */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function createModel(RegisterDto $dto): array
    {
        return [
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
        ];
    }
}
