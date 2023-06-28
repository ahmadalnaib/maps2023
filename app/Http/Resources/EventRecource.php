<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventRecource extends JsonResource
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
            'user_id'=>$this->user_id,
            'system_id'=>$this->system_id,
            'box_id'=>$this->box_id,
            'rental_uuid'=>$this->rental_uuid,
            'event_id'=>$this->event_id,
            'priority'=>$this->priority,
            'message'=>$this->message,
            'data'=>$this->data,
            'date_time' => date("Y-m-d H:i:s", strtotime($this->date_time)),
     

        ];
    }
}
