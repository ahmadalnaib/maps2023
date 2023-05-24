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
    //   $lockers = $place->lockers()->with('doors')->get();
    //   $plans = Plan::whereHas('locker.place', function ($query) use ($place) {
    //     $query->where('user_id', $place->user_id);
    // })->get();

    $lockers = $place->lockers()->with('doors')->get();
    $plansByDoor = [];

    foreach ($lockers as $locker) {
        foreach ($locker->doors as $door) {
            if ($door->rentals->isEmpty()) {
                $plansByDoor[$door->id] = $door->plans;
            }
        }
    }

    return view('details', compact('place', 'lockers', 'plansByDoor'));

  }
}

