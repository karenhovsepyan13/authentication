<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;


class UnauthorizedUser extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'Wrong email or password',
        ], Response::HTTP_UNAUTHORIZED));
    }
}
