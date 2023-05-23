<?php

namespace App\Http\Controllers\Admin\Place;

use App\Models\Place;
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

      return redirect()->route('admin.place.index');
         
    }
}
