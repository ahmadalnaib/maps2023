<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BoxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tenant_id' => $this->tenant_id,
            'team_id'=>$this->team_id,
            'number' => $this->number,
            'box_type_id' => $this->box_type_id,
            'plans' => PlanResource::collection($this->whenLoaded('plans')),
            'system_id' => $this->system_id,
            'api_id' => $this->api_id,
          
        ];
    }
}
