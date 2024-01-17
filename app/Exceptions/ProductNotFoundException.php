<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProductNotFoundException extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'Product is not found',
        ], ResponseAlias::HTTP_UNAUTHORIZED));
    }
}
