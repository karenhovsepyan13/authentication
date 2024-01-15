<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{

    public const NAME = 'name';
    public const  PRICE = 'price';
    public const COUNTRY = 'country';

    public const COUNT = 'count';


    public
    function authorize(): bool
    {
        return true;
    }

    public
    function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],
            self::PRICE => [
                'required',
                'int',
            ],

            self::COUNTRY => [
                'required',
                'string',
            ],
            self::COUNT => [
                'required',
                'int',
            ],

        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getPrice(): string
    {
        return $this->get(self::PRICE);
    }

    public function getCountry(): string
    {
        return $this->get(self::COUNTRY);
    }

    public function getCount(): string
    {
        return $this->get(self::COUNT);
    }
}
