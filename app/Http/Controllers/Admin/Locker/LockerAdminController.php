<?php

namespace App\Http\Controllers\Admin\Locker;


use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LockerAdminController extends Controller
{
    //

    public function index()
    {
        $lockers=Locker::latest()->paginate(8);
        return view('admin.locker.index',compact('lockers'));
    }

    public function create()
    {
        $places=Place::all();
        return view('admin.locker.create',compact('places'));
    }

    public function store(Request $request)
    {
       
        $locker= Locker::create([
            "locker_number" =>$request->locker_number,
            "place_id"=>$request->place_id
        ]);

        return redirect()->route('admin.locker.index');
    }
}
