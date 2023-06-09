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
        $tenant = Auth::user();
          $boxTypes = BoxType::where('tenant_id', $tenant->id)
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
        $boxType = BoxType::create([
            'tenant_id' => auth()->user()->tenant_id,
          
            'name' => $request->name,
            'depth' => $request->depth,
            'width' => $request->width,
            'height' => $request->height,
            'description' => $request->description,
            'ebike_option' => $request->ebike_option,
            'first_floor_option' => $request->first_floor_option,
            'big' => $request->big,
        ]);

        return redirect()->route('admin.boxtype.index')->with('message', 'Box type created successfully!');

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

        return redirect()->route('admin.boxtype.index')->with('message', 'Box type updated successfully!');

    }

    public function destroy(BoxType $type)
    {
        $type->delete();

        return redirect()->route('admin.boxtype.index')->with('message', 'Box type deleted successfully!');
    }

    


}
