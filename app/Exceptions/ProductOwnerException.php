<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductOwnerException extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'You are not the owner of the product',
        ], Response::HTTP_NOT_FOUND));
    }
}
