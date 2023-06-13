<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Rental extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'tenant_id'=>$this->tenant_id,
            'user_id'=>$this->user_id,
            'system_id'=>$this->system_id,
            'box_id'=>$this->box_id,
            'plan_id'=>$this->plan_id,
            'duration'=>$this->duration,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'price'=>$this->price,
            'pincode'=>$this->pincode,

        ];
    }
}
