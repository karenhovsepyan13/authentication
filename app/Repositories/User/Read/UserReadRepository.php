<?php

namespace App\Repositories\User\Read;

use App\Models\User;
use App\Exceptions\UnauthorizedUser;
use Illuminate\Database\Eloquent\Builder;

class UserReadRepository implements UserReadRepositoryInterface
{
    public function query(): Builder
    {
        return User::query();
    }

    public function getByEmail($email): User
    {
        /**@var User $user */
        $user = $this->query()->where('email', $email)->first();

        if (!$user) {
            throw new UnauthorizedUser();
        }

        return $user;
    }
}
