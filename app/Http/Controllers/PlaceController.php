<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    //
    public function index()
    {
        $places=Place::orderBy('view_count','desc')->take(3)->get();
        return view('welcome',compact('places'));
    }

    public function show(Place $place)
    {
      return view('details',compact('place'));
    }
}
