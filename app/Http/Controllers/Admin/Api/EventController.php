<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventRecource;

class EventController extends Controller
{
    //

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => '',
            'system_id' => 'required',
            'box_id' => '',
            'rental_id' => '',
            'event_id' => 'required',
            'priority'=>'required',
            'message' => 'required',
            'date_time' => 'required',
            'data' => '',
           
        
        ]);

        $event = Event::create($validatedData);

        $EventRecource = new EventRecource($event);

        return $EventRecource->response()->setStatusCode(201);
    }
}
