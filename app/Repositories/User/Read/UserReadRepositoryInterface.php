<?php

namespace App\Repositories\User\Read;

interface UserReadRepositoryInterface
{
    public function getByEmail(array $email);
}
