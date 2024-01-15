<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductNotFoundException extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'Product not found',
        ], Response::HTTP_UNAUTHORIZED));
    }
}
