<?php

namespace App\Http\Requests\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public const NAME = 'name';
    public const PRICE = 'price';
    public const COUNTRY = 'country';
    public const COUNT = 'count';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::NAME => [
                'nullable',
                'string',
            ],
            self::PRICE => [
                'nullable',
                'integer',
            ],
            self::COUNTRY => [
                'nullable',
                'string',
            ],
            self::COUNT => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function getName(): ?string
    {
        return $this->get(self::NAME);
    }

    public function getPrice(): ?int
    {
        return $this->get(self::PRICE);
    }

    public function getCountry(): ?string
    {
        return $this->get(self::COUNTRY);
    }

    public function getCount(): ?int
    {
        return $this->get(self::COUNT);
    }

    public function getProductId(): int
    {
        return $this->route('id');
    }

    public function getUserId(): int
    {
        $user = Auth::user();

        return $user->id;
    }
}
