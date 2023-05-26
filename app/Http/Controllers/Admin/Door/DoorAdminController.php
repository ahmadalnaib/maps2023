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
             'charge' => $request->has('charge') ? 1 : 0,
          
         ]);
 
         return redirect()->route('admin.door.index')->with('message','Door wurde aktualisiert 🎉')->with('timeout', 3000);;
     }

     public function edit(Door $door)
     {
         $tenant = Auth::user();
         $lockers = Locker::where('tenant_id', $tenant->id)
             ->latest()
             ->get();
 
         return view('admin.door.edit', compact('door', 'lockers'));
     }
 
     public function update(Request $request, Door $door)
     {
         $door->update([
             'door_number' => $request->door_number,
             'locker_id' => $request->locker_id,
             'size' => $request->size,
             'charge' => $request->has('charge') ? 1 : 0, 
         ]);
 
         return redirect()->route('admin.door.index')->with('message','Door wurde aktualisiert 🎉')->with('timeout', 3000);;
     }
 
     public function destroy(Door $door)
     {
         $door->delete();
 
         return redirect()->route('admin.door.index')->with('message','Door wurde delete 🎉')->with('timeout', 3000);;
     }
}
