<?php

namespace App\Http\Requests\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getUserId(): int
    {
        $user = Auth::user();

         return $user->id;
    }
}