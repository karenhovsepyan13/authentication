<?php

namespace App\Repositories\User\Write;

use App\Models\User;

interface UserWriteRepositoryInterface
{
    public function create(array $data): User;
}
