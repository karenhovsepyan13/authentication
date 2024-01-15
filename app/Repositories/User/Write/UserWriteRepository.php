<?php

namespace App\Repositories\User\Write;

use App\Models\User;
use App\Exceptions\RegistrationFailedException;


class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function create($data): User
    {
        /* @var User $user */
        $user = User::query()->create($data);

        if (!$user) {
            throw new RegistrationFailedException();
        }

        return $user;
    }
}
