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
        $user = Auth::user();
        $systems = System::where('team_id', $user->currentTeam->id) // Use team_id instead of tenant_id
            ->latest()
            ->paginate(8);

        return view('admin.system.index', compact('systems'));
    }
  
    public function create()
    {
        $user = Auth::user();
        $chosenPlaces = System::where('team_id', $user->currentTeam->id)->pluck('place_id')->toArray();
        $places = Place::where('team_id', $user->currentTeam->id)
            ->whereNotIn('id', $chosenPlaces)
            ->latest()
            ->get();

        return view('admin.system.create', compact('places'));
    }
      
  
    public function store(SystemRequest $request)
    {
        System::create([
            'system_name' => $request->system_name,
            'place_id' => $request->place_id,
            'team_id' => Auth::user()->currentTeam->id, // Use team_id instead of tenant_id
        ]);

        return redirect()->route('admin.system.index')
            ->with('message', 'System created successfully')
            ->with('timeout', 3000);
    }
  
  
    public function edit(System $system)
    {
        $user = Auth::user();
        $places = Place::where('team_id', $user->currentTeam->id)
            ->latest()
            ->get();

        return view('admin.system.edit', compact('system', 'places'));
    }
  
  
      public function update(SystemRequest $request, System $system)
      {
          $system->update([
              'system_name' => $request->system_name,
            
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
