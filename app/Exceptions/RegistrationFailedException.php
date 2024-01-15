<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegistrationFailedException extends HttpResponseException
{
    public function __construct()
    {
        parent::__construct(response()->json([
            'message' => 'Registration failed!',
        ], Response::HTTP_BAD_REQUEST));
    }
}
