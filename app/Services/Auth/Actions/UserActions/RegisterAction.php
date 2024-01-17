<?php

namespace App\Services\Auth\Actions\UserActions;

use App\Models\User;
use App\Services\Auth\Dto\UserDto\RegisterDto;
use App\Repositories\User\Write\UserWriteRepositoryInterface;

class RegisterAction
{
    public function __construct(private readonly UserWriteRepositoryInterface $userWriteRepository)
    {
    }

    public function run(RegisterDto $dto): User
    {
        $user = User::createModel($dto);

        return $this->userWriteRepository->create($user);
    }
}
