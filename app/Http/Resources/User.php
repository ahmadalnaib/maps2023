<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Full Name' => $this->name,
            'E-Mail' => $this->email,
            'role'=>$this->role,
            'current_team_id'=>$this->current_team_id,
            'email_verified_at'=>$this->email_verified_at !== null,
           
        ];
    }
}
