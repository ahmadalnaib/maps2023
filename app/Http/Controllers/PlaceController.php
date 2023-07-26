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

    if ($system && isset($system->boxes)) {
        foreach ($system->boxes as $box) {
            $isDefective = $box->defective ? true: false;
            $box_Rental_uuid = $box->rental_uuid ? true : false;
            
            if ($box->boxType->first_floor_option){
                $firstFloorBoxes[] = $box->id;
            }else{
                $secondFloorBoxes[] = $box->id;
            }
            if ( $box->status &&  !$isDefective && !$box_Rental_uuid) {

                $plansByBox[$box->id] = $box->plans;
            }
        } }else{
            return view('placeNotCreated');

        }
    

    return view('details', compact('place', 'system','plansByBox', 'firstFloorBoxes', 'secondFloorBoxes'));

  }
}

