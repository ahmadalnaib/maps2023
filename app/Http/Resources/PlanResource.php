<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'policy_id'=>$this->policy_id,
            'name'=>$this->name,
            'number_of_days'=>$this->number_of_days,
            'duration_unit'=>$this->duration_unit,
            'price'=>$this->price,
            'active'=>$this->active,
            'boxes' => BoxResource::collection($this->whenLoaded('boxes')),
            
           

        ];
    }
}
