<?php

namespace App\Http\Controllers\Admin\Place;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PlaceAdminController extends Controller
{
    public function index(Request $request)
    {

        
        $tenant = Auth::user();
        // $places = Place::where('tenant_id', $tenant->id)
        $places=Place::where('team_id',$request->user()->currentTeam->id)
            ->latest()
            ->paginate(8);
        
        return view('admin.place.index', compact('places'));
    }

    public function create()
    {
        return view('admin.place.create');
    }

    public function store(PlaceRequest $request)
    {


        foreach(config('locales.languages') as $key =>$val){
            if ($key ==='de'){

                $attr['overview.' .$key]= 'required';
            }

            $validation=Validator::make($request->all(),$attr);
            if($validation->fails()){
                return redirect()->back()->withErrors($validation)->withInput();
            }
            $data['overview'] = $request->overview;
            $data['team_id'] = $request->user()->team_id;
          
      



        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $request->user()->places()->create($request->except(['image']) + ['image' => $imageName, 'team_id' => $request->user()->id]);


        
        } else {
           
            $request->user()->places()->create($request->all());
        }
       
        return redirect()->route('admin.place.index')->with('message', 'Place was created successfully 🎉')->with('timeout', 3000);
    }
}

    public function edit(Place $place)
    {
        $categories = Category::all();
        return view('admin.place.edit', compact('place', 'categories'));
    }

    public function update(PlaceRequest $request, Place $place)
    {

        foreach(config('locales.languages') as $key =>$val){
            $attr['overview.' .$key]= 'required';
           
        }

        $validation=Validator::make($request->all(),$attr);

       if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $data['overview']=$request->overview;

        $place->name = $request->input('name');
        $place->category_id = $request->input('category_id');
        $place->address = $request->input('address');
        $place->longitude = $request->input('longitude');
        $place->latitude = $request->input('latitude');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $place->image = $imageName;
        }

        $place->update($data);

        return redirect()->route('admin.place.index')->with('message', 'Place was updated successfully 🎉')->with('timeout', 3000);
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('admin.place.index')->with('message', 'Place was deleted 🗑');
    }
}
