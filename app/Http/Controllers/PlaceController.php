<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Plan;
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

    $system = $place->systems()->with(['boxes'])->get()->first();
    $plansByBox = [];
    $firstFloorBoxes = [];
    $secondFloorBoxes = [];

   
        foreach ($system->boxes as $box) {
            if ($box->boxType->first_floor_option){
                $firstFloorBoxes[] = $box->id;
            }else{
                $secondFloorBoxes[] = $box->id;
            }
            if ($box->rentals->isNotEmpty() && $box->rentals->last()->end_time->isPast() || $box->rentals->isEmpty()) {

                $plansByBox[$box->id] = $box->plans;
            }
        }
    

    return view('details', compact('place', 'system','plansByBox', 'firstFloorBoxes', 'secondFloorBoxes'));

  }
}

