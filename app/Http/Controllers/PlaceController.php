<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    //
    public function index()
    {
        $places=Place::orderBy('view_count','desc')->get();
        return view('index',compact('places'));
    }



    public function show(Place $place)
    {

    // $system = $place->systems()->with(['boxes'])->get()->first();
    $system = $place->systems()
    ->with(['boxes' => function ($query) {
        $query->orderBy('number');
    }])
    ->get()
    ->first();

    $plansByBox = [];
    $firstFloorBoxes = [];
    $secondFloorBoxes = [];
    $lastStatus = Carbon::parse($system->last_status);
    $timeDifference = now()->diffInMinutes($lastStatus);

    // change the system to live to 15 min
    if ($system && isset($system->boxes) && $timeDifference <= 15) {
        foreach ($system->boxes as $box) {
            $isRented = $box->rentals->isNotEmpty();
            $isEndTimePassed = $isRented && $box->rentals->last()->end_time->isPast();
            $isDefective = $box->defective ? true: false;
            $box_Rental_uuid = $box->rental_uuid ? true : false;
          
          
         
            
            if ($box->boxType->first_floor_option){
                $firstFloorBoxes[] = $box->id;
            }else{
                $secondFloorBoxes[] = $box->id;
            }
            if (($box->status && !$box->defective && !$box->rental_uuid )  && (!$box->rentals->last() || $box->rentals->last()->end_time->isPast())) {

                $plansByBox[$box->id] = $box->plans;
            }
        } }else{
            if (!$system || !isset($system->boxes)) {
                return view('placeNotCreated'); // Display message for this condition
            } elseif ($timeDifference > 15) {
                return view('systemdisconnect');
            }
           

        }
    

    return view('details', compact('place', 'system','plansByBox', 'firstFloorBoxes', 'secondFloorBoxes'));

  }
}

