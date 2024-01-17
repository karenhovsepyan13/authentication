<?php

namespace App\Services\Auth\Dto\UserDto;

use Spatie\LaravelData\Data;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterDto extends Data
{
    public string $name;
    public string $email;
    public string $password;

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::from([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),
        ]);
    }
}
