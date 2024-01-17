<?php

namespace App\Repositories\User\Read;

use App\Models\User;

interface UserReadRepositoryInterface
{
    public function getByEmail(array $email): User;
}
