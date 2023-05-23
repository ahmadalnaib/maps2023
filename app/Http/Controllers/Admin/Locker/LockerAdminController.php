<?php

namespace App\Http\Controllers\Admin\Locker;


use App\Models\Place;
use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LockerAdminController extends Controller
{
    //

    public function index()
    {
        $tenant = Auth::user();
        $lockers = Locker::where('tenant_id', $tenant->id)
        ->latest()
        ->paginate(8);

   
     return view('admin.locker.index',compact('lockers'));
    }

    public function create()
    {
        $tenant = Auth::user();
        $places = Place::where('tenant_id', $tenant->id)
        ->latest()
        ->get();
        return view('admin.locker.create',compact('places'));
    }

    public function store(Request $request)
    {
       
        $locker= Locker::create([
            "locker_name" =>$request->locker_name,
            "place_id"=>$request->place_id
        ]);

        return redirect()->route('admin.locker.index');
    }
}
