<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\RegistrationFailedException;

class RegisterRequest extends FormRequest
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],
            self::EMAIL => [
                'required',
                'string',
                'email',
                'unique:users'
            ],
            self::PASSWORD => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new RegistrationFailedException();
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
