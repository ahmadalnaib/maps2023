<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Models\Door;
use App\Models\Plan;
use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Requests\PlanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    //

    public function index()
    {
        $tenant = Auth::user();
        $plans = Plan::with(['locker', 'doors']) // Eager load the locker and doors relationships
            ->where('tenant_id', $tenant->id)
            ->latest()
            ->paginate(8);

            // dd($plans[1]->doors);

   
     return view('admin.plan.index',compact('plans'));
    }

    public function create()
    {
        $tenant = Auth::user();
        $lockers = Locker::where('tenant_id', $tenant->id)
        ->latest()
        ->get();
      // Load the doors relationship for the selected locker
    $doors = $lockers->first()->doors ?? collect();

        return view('admin.plan.create',compact('lockers','doors'));
    }

    public function store(PlanRequest  $request)
    {
       
        $plan= Plan::create([
            "name" =>$request->name,
            "number_of_days"=>$request->number_of_days,
            'price' => $request->price,
            "locker_id"=>$request->locker_id,
            "door_id"=>$request->door_id,
         
        
         
        ]);
        $plan->doors()->attach($request->door_id);

        return redirect()->route('admin.plan.index');
    }

    public function edit(Plan $plan)
    {
        $tenant = Auth::user();
        $lockers = Locker::where('tenant_id', $tenant->id)
            ->latest()
            ->get();

        $doors = Door::where('tenant_id', $tenant->id)
            ->latest()
            ->get();

        return view('admin.plan.edit', compact('plan', 'lockers', 'doors'));
    }

    public function update(PlanRequest  $request, Plan $plan)
    {
        $plan->update([
            "name" => $request->name,
            "number_of_days" => $request->number_of_days,
            'price' => $request->price,
            "locker_id" => $request->locker_id,
            "door_id" => $request->door_id,
            
        ]);
        $plan->doors()->sync($request->door_id);
        return redirect()->route('admin.plan.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('admin.plan.index');
    }
}
