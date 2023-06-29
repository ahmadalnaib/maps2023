<?php

namespace App\Http\Controllers\Admin\BoxType;

use App\Models\BoxType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BoxTypeRequest;

class BoxTypeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $boxTypes = BoxType::where('team_id', $user->currentTeam->id) // Use team_id instead of tenant_id
            ->latest()
            ->paginate(8);
        return view('admin.boxtypes.index', compact('boxTypes'));
    }

    public function create()
    {
        return view('admin.boxtypes.create');
    }


    public function store(BoxTypeRequest $request)
    {
        $user = Auth::user();
        $boxType = BoxType::create([
            'team_id' => $user->currentTeam->id, // Use team_id instead of tenant_id
            'name' => $request->name,
            'depth' => $request->depth,
            'width' => $request->width,
            'height' => $request->height,
            'description' => $request->description,
            'ebike_option' => $request->ebike_option,
            'first_floor_option' => $request->first_floor_option,
            'big' => $request->big,
        ]);

        return redirect()->route('admin.boxtype.index')->with('message', 'Fach Typen erfolgreich erstellt 🎉')->with('timeout', 3000);
    }


    public function edit(BoxType $type)
    {
        return view('admin.boxtypes.edit', compact('type'));
    }
    


    public function update(BoxTypeRequest $request, BoxType $type)
    {
        $type->update([
            'name' => $request->name,
            'depth' => $request->depth,
            'width' => $request->width,
            'height' => $request->height,
            'description' => $request->description,
            'ebike_option' => $request->ebike_option,
            'first_floor_option' => $request->first_floor_option,
            'big' => $request->big,
        ]);

        return redirect()->route('admin.boxtype.index')->with('message', 'Fach Typen wurde  aktualisiert 🎉')->with('timeout', 3000);
    }

    public function destroy(BoxType $type)
    {
        $type->delete();

        return redirect()->route('admin.boxtype.index')->with('message', 'Fach Typen erfolgreich gelöscht')->with('timeout', 3000);
    }

    


}
