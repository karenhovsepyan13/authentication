<?php

namespace App\Services\Auth\Actions\UserActions;

use App\Exceptions\UnauthorizedUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use App\Http\Resources\User\LoginResource;
use App\Services\Auth\Dto\UserDto\LoginDto;
use App\Repositories\User\Read\UserReadRepositoryInterface;

class LoginAction
{
    public function __construct(
        private readonly UserReadRepositoryInterface $readRepository
    ) {
    }

    public function run(LoginDto $dto): LoginResource
    {
        $clientId = Config::get('passport.personal_grant_client.id');
        $clientSecret = Config::get('passport.personal_grant_client.secret');

        $result = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'username' => $dto->email,
            'password' => $dto->password,
            'scope' => '*',
        ]);

        $user = $this->readRepository->getByEmail((array)$dto->email);

        if (Hash::check($dto->password, $user->password)) {
            $responseData = [
                'success' => true,
                'token' => json_decode($result),
            ];
        } else {
            throw new UnauthorizedUser();
        }

        return new LoginResource($responseData);
    }
}
