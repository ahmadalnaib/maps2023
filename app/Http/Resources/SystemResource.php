<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class SystemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $placeUrl = $this->place ? URL::to('/places/' . $this->place_id) : null;
        $websiteUrl = URL::to('/');
      
        $currentTime = Carbon::now()->toDateTimeString();
        return [
            'id'=>$this->id,
            'tenant_id'=>$this->tenant_id,
            'team_id'=>$this->team_id,
            'place_id'=>$this->place_id,
            'system_name'=>$this->system_name,
            'place_name' => $this->place ? $this->place->name : null,
            'website_url' => $websiteUrl,
            'current_url'=> URL::to('/de/'. $this->place->name.'/'.$this->place->slug.''),
            'currentTime'=>$currentTime,
            'last_status'=>$this->last_status
           

        ];
    }
}
