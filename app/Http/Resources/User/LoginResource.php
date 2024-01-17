<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request): array
    {
        $token = $this->resource['token'];
        return [
            'success' => $this->resource['success'],
            'access_token' => $token->access_token ?? null,
            'type' => $token->token_type ?? null,
            'refresh_token' => $token->refresh_token ?? null,
            'expires_in' => $token->expires_in >> null
        ];
    }
}
