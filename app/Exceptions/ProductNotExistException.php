<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductNotExistException extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'You have no products',
        ], Response::HTTP_NOT_FOUND));
    }
}
