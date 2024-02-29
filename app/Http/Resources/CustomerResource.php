<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'] ?? null,
            'first_name' => $this['first_name'] ?? null,
            'last_name' => $this['last_name'] ?? null,
            'city' => $this['city'] ?? null,
            'email' => $this['email'] ?? null,
            'gender' => $this['gender'] ?? null,
            'mobile' => $this['mobile'] ?? null
        ];
    }
}
