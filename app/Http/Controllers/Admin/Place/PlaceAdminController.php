<?php

namespace App\Http\Controllers\Admin\Place;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlaceAdminController extends Controller
{
    //

    public function index()
    {
      // Retrieve the current authenticated tenant
      $tenant = Auth::user();

      // // Retrieve the places associated with the current tenant
     $places = Place::where('tenant_id', $tenant->id)
         ->latest()
         ->paginate(8);

    
      return view('admin.place.index',compact('places'));
    }

    public function create()
    {
        return view('admin.place.create');
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

      return redirect()->route('admin.place.index')->with('message','Place wurde created 🎉')->with('timeout', 3000);;
         
    }

    public function edit(Place $place)
    {
      $categories = Category::all();
        return view('admin.place.edit', compact('place','categories'));
    }

    public function update(Request $request, Place $place)
    {
      $place->name = $request->input('name');
      $place->category_id = $request->input('category_id');
      $place->overview = $request->input('overview');
      $place->address = $request->input('address');
      $place->longitude = $request->input('longitude');
      $place->latitude = $request->input('latitude');

      if ($request->hasFile('image')) {
          $imageName = time() . '.' . $request->image->extension();
          $request->image->storeAs('public/images', $imageName);
          $place->image = $imageName;
      }

      $place->save();

        return redirect()->route('admin.place.index')->with('message','Place wurde update 🎉')->with('timeout', 3000);;
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('admin.place.index')->with('message','Place wurde gelöscht 🗑');
    }
}
