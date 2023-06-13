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
       $tenant = Auth::user();
       $boxes = Box::where('tenant_id', $tenant->id)
       ->latest()
       ->paginate(8);

  
    return view('admin.box.index',compact('boxes'));
    }

    public function create()
    {
       $tenant = Auth::user();
       $systems = System::where('tenant_id', $tenant->id)
       ->latest()
       ->get();
       $plans = Plan::where('tenant_id', $tenant->id)
       ->latest()
       ->get();

       $boxTypes = BoxType::where('tenant_id', $tenant->id)
       ->latest()
       ->get();
   return view('admin.box.create', compact('systems', 'plans', 'boxTypes'));
     
    }

    public function store(BoxRequest $request)
    {
        $box = Box::create([
            'number' => $request->number,
            'system_id' => $request->system_id,
            'box_type_id'=>$request->box_type_id,
            'plan_id' => implode(',', $request->plan_id),

           
        ]);
        $box->plans()->attach($request->plan_id); // Assuming you have a plan_id field in the request
    
        return redirect()->route('admin.box.index')->with('message', 'Box wurde aktualisiert 🎉')->with('timeout', 3000);
    }
    

    public function edit(Box $box)
    {
        $tenant = Auth::user();
        $systems = System::where('tenant_id', $tenant->id)
            ->latest()
            ->get();
        
        $plans = Plan::where('tenant_id', $tenant->id)
            ->latest()
            ->get();
    
        $boxTypes = BoxType::where('tenant_id', $tenant->id)
            ->latest()
            ->get();
    
        return view('admin.box.edit', compact('box', 'systems', 'plans', 'boxTypes'));
    }
    

    public function update(BoxRequest $request, Box $box)
    {
        $box->update([
            'number' => $request->number,
            'system_id' => $request->system_id,
            'box_type_id'=>$request->box_type_id,
        ]);
        $box->plans()->sync($request->plan_id); // Sync the selected plan IDs
    
        return redirect()->route('admin.box.index')->with('message', 'box wurde aktualisiert 🎉')->with('timeout', 3000);
    }
    

    public function destroy(Box $box)
    {
        $box->delete();

        return redirect()->route('admin.box.index')->with('message','Box wurde delete 🎉')->with('timeout', 3000);;
    }
}
