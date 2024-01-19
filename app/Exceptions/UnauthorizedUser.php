<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UnauthorizedUser extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'Wrong email or password',
        ], ResponseAlias::HTTP_UNAUTHORIZED));
    }
}
