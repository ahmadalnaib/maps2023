<?php

namespace App\Http\Controllers\Admin\Box;

use App\Models\Box;
use App\Models\Plan;
use App\Models\System;
use App\Models\BoxType;
use Illuminate\Http\Request;
use App\Http\Requests\BoxRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    //

    public function index()
    {
        $teamId = Auth::user()->currentTeam->id;
        $boxes = Box::query()
            ->select('id', 'number', 'system_id', 'box_type_id', 'team_id','status')
            ->with('user:id', 'system:id,system_name', 'plans:id,name', 'boxtype:id,name')
            ->where('team_id', $teamId)
            ->latest()
            ->paginate(8);

        return view('admin.box.index', compact('boxes'));
    }

    public function create()
    {
        $teamId = Auth::user()->currentTeam->id;
        $systems = System::where('team_id', $teamId)
            ->latest()
            ->get();
        $plans = Plan::where('team_id', $teamId)
            ->latest()
            ->get();

        $boxTypes = BoxType::where('team_id', $teamId)
            ->latest()
            ->get();

        return view('admin.box.create', compact('systems', 'plans', 'boxTypes'));
    }

    public function store(BoxRequest $request)
    {
        $teamId = Auth::user()->currentTeam->id;
    
        $box = Box::create([
            'number' => $request->number,
            'system_id' => $request->system_id,
            'box_type_id' => $request->box_type_id,
            'team_id' => $teamId,
            'plan_id' => implode(',', $request->plan_id),
        ]);
        $box->plans()->attach($request->plan_id); // Assuming you have a plan_id field in the request
    
        return redirect()->route('admin.box.index')->with('message', 'Fach erfolgreich erstellt🎉')->with('timeout', 3000);
    }
    

    public function edit(Box $box)
    {
        $teamId = Auth::user()->currentTeam->id;
        $systems = System::where('team_id', $teamId)
            ->latest()
            ->get();

        $plans = Plan::where('team_id', $teamId)
            ->latest()
            ->get();

        $boxTypes = BoxType::where('team_id', $teamId)
            ->latest()
            ->get();

        return view('admin.box.edit', compact('box', 'systems', 'plans', 'boxTypes'));
    }
    

    public function update(BoxRequest $request, Box $box)
    {
        $teamId = Auth::user()->currentTeam->id;

        $box->update([
            'number' => $request->number,
            'system_id' => $request->system_id,
            'box_type_id' => $request->box_type_id,
            'team_id' => $teamId,
            'status' => $request->has('status')
        ]);
        $box->plans()->sync($request->plan_id); // Sync the selected plan IDs

        return redirect()->route('admin.box.index')->with('message', 'Fach wurde aktualisiert 🎉')->with('timeout', 3000);
    }
    

    public function destroy(Box $box)
    {
        $this->authorize('delete',$box);
        $box->delete();

        return redirect()->route('admin.box.index')->with('message','Fach erfolgreich gelöscht ')->with('timeout', 3000);
    }
}
