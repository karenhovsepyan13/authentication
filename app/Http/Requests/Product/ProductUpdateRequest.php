<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public const NAME = 'name';
    public const PRICE = 'price';
    public const COUNTRY = 'country';
    public const COUNT = 'count';


    public function authorize()
    {
        $productId = $this->getId();

        return $this->user()->can('update', [Product::class, $productId]);
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

    public function getId(): int
    {
        return $this->route('id');
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }
}
