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
            'number' => $this->number,
            'box_type_id' => $this->box_type_id,
            'plan' => new PlanResource($this->whenLoaded('plan')), // Include the associated plan
            'system_id' => $this->system_id,
            'api_id' => $this->api_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
