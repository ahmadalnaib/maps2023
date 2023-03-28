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

    public function create()
    {
      return view('add_place');
    }

    public function show(Place $place)
    {
      $lockers = $place->lockers()->with('doors')->get();
      return view('details', compact('place', 'lockers'));
 
    }

    public function store(Request $request)
    {
      if($request->image){
        $imageName=time().'.'.$request->image->extension();
        $request->image->storeAs('public\images',$imageName);
        $request->user()->places()->create($request->except('image') + ['image' => $imageName]);
      }else{
         $request->user()->places()->create($request->all());
      }

      return back();
         
    }
}
