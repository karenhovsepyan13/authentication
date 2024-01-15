<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\LoginResource;
use App\Services\Auth\Actions\UserActions\LoginAction;
use App\Services\Auth\Dto\UserDto\LoginDto;

class LoginController extends Controller
{
    public function login(
        LoginRequest $request,
        LoginAction $action,
    ): LoginResource {
        $dto = LoginDto::fromRequest($request);
        $user = $action->run($dto);

        return new LoginResource($user);
    }
}
