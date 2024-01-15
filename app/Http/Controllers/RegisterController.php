<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Services\Auth\Actions\UserActions\RegisterAction;
use App\Services\Auth\Dto\UserDto\RegisterDto;

class RegisterController extends Controller
{
    public function register(
        RegisterRequest $request,
        RegisterAction $action
    ): UserResource {
        $dto = RegisterDto::fromRequest($request);
        $result = $action->run($dto);

        return new UserResource($result);
    }
}
