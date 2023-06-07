<?php
namespace App\Http\Controllers\Admin\System;

use App\Models\Place;
use App\Models\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SystemRequest;
use Illuminate\Support\Facades\Auth;



class SystemController extends Controller
{
    

      public function index()
      {
          $tenant = Auth::user();
          $systems = System::where('tenant_id', $tenant->id)
          ->latest()
          ->paginate(8);
  
     
       return view('admin.system.index',compact('systems'));
      }
  
      public function create()
      {
          $tenant = Auth::user();
          $places = Place::where('tenant_id', $tenant->id)
          ->latest()
          ->get();
          return view('admin.system.create',compact('places'));
      }
  
      public function store(SystemRequest $request)
      {
            System::create([
              'system_name' => $request->system_name,
              'address' => $request->address,
              'place_id' => $request->place_id,
              'tenant_id' => auth()->user()->tenant_id,
          ]);
      
          return redirect()->route('admin.system.index')->with('message', 'System wurde aktualisiert 🎉')->with('timeout', 3000);
      }
      
  
  
      public function edit(System $system)
      {
          $tenant = Auth::user();
          $places = Place::where('tenant_id', $tenant->id)
              ->latest()
              ->get();
  
          return view('admin.system.edit', compact('system', 'places'));
      }
  
  
      public function update(SystemRequest $request, System $system)
      {
          $system->update([
              'system_name' => $request->system_name,
              'address' => $request->address,
              'place_id' => $request->place_id,
          ]);
      
          return redirect()->route('admin.system.index')->with('message', 'System wurde update 🎉')->with('timeout', 3000);
      }
      
  
  
      public function destroy(System $system)
      {
          $system->delete();
  
          return redirect()->route('admin.system.index')->with('message','system wurde gelöscht 🗑');
      }
}
