<?php

namespace App\Http\Controllers\Admin\Door;

use App\Models\Door;
use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DoorAdminController extends Controller
{
    
     public function index()
     {
        $tenant = Auth::user();
        $doors = Door::where('tenant_id', $tenant->id)
        ->latest()
        ->paginate(8);

   
     return view('admin.door.index',compact('doors'));
     }

     public function create()
     {
        $tenant = Auth::user();
        $lockers = Locker::where('tenant_id', $tenant->id)
        ->latest()
        ->get();
      return view('admin.door.create',compact('lockers'));
     }

     public function store(Request $request)
     {
        
         $door= Door::create([
             "door_number" =>$request->door_number,
             "locker_id"=>$request->locker_id,
             'size' => $request->size,
          
         ]);
 
         return redirect()->route('admin.door.index');
     }
}
