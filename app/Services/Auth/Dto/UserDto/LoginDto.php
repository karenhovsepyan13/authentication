<?php

namespace App\Services\Auth\Dto\UserDto;

use App\Http\Requests\Auth\LoginRequest;
use Spatie\LaravelData\Data;

class LoginDto extends Data
{
    public string $email;
    public string $password;

    public static function fromRequest(LoginRequest $request): LoginDto
    {
        return self::from([
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ]);
    }
}
