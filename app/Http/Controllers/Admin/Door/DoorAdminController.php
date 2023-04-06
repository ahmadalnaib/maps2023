<?php

namespace App\Http\Controllers\Admin\Door;

use App\Models\Door;
use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoorAdminController extends Controller
{
    
     public function index()
     {
        $doors=Door::latest()->paginate(8);
        return view('admin.door.index',compact('doors'));
     }

     public function create()
     {
      $lockers=Locker::all();
      return view('admin.door.create',compact('lockers'));
     }

     public function store(Request $request)
     {
        
         $door= Door::create([
             "door_number" =>$request->door_number,
             "locker_id"=>$request->locker_id,
             "is_big"=>boolval($request->is_big) ?? false,
          
         ]);
 
         return redirect()->route('admin.door.index');
     }
}
