<?php

namespace App\Services\Auth\Dto\UserDto;

use Spatie\LaravelData\Data;
use App\Http\Requests\Auth\LoginRequest;

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
