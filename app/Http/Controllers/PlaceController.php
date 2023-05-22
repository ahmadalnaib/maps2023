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
      $lockers = $place->lockers()->with('doors')->get();
      $plans = Plan::all();
      return view('details', compact('place', 'lockers','plans'));
 
    }

   
}
