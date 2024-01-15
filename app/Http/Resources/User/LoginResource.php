<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'success' => $this->resource['success'],
            'message' => $this->resource['message'] ?? null,
            'token' => $this->resource['token'] ?? null,
        ];
    }
}
