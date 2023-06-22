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
            'uuid'=>$this->uuid,
            'tenant_id'=>$this->tenant_id,
            'user_id'=>$this->user_id,
            'system_id'=>$this->system_id,
            'box_id'=>$this->box_id,
            'plan_id'=>$this->plan_id,
            'duration'=>$this->duration,
            'start_time' => date("Y-m-d H:i:s", strtotime($this->start_time)),
        'end_time' => date("Y-m-d H:i:s", strtotime($this->end_time)),
            'price'=>$this->price,
            'pincode'=>$this->pincode,

        ];
    }
}
