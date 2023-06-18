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

    $systems = $place->systems()->with(['boxes'])->get();
    $plansByBox = [];

    foreach ($systems as $system) {
        foreach ($system->boxes as $box) {
            if ($box->rentals && $box->rentals->isEmpty()) {

                $plansByBox[$box->id] = $box->plans;
            }
        }
    }

    return view('details', compact('place', 'systems','plansByBox'));

  }
}

