<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\LoginResource;
use App\Services\Auth\Dto\UserDto\LoginDto;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\Dto\UserDto\RegisterDto;
use App\Services\Auth\Actions\UserActions\LoginAction;
use App\Services\Auth\Actions\UserActions\RegisterAction;

class AuthController extends Controller
{
    public function register(
        RegisterRequest $request,
        RegisterAction $action
    ): UserResource {
        $dto = RegisterDto::fromRequest($request);
        $result = $action->run($dto);

        return new UserResource($result);
    }

    public function login(
        LoginRequest $request,
        LoginAction $action,
    ): LoginResource {
        $dto = LoginDto::fromRequest($request);
        $user = $action->run($dto);

        return new LoginResource($user);
    }
}