<?php

namespace App\Http\Controllers\Admin\Plan;


use App\Models\Plan;
use App\Models\Policy;
use App\Models\System;
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
        // $plans = Plan::with(['system', 'doors']) // Eager load the locker and doors relationships
        //     ->where('tenant_id', $tenant->id)
        //     ->latest()
        //     ->paginate(8);

        $plans=Plan::with(['policy'])
        ->where('tenant_id', $tenant->id)
             ->latest()
             ->paginate(8);

            // dd($plans[1]->doors);

   
     return view('admin.plan.index',compact('plans'));
    }

    public function create()
    {
        $tenant = Auth::user();
        $policies = Policy::where('tenant_id', $tenant->id)
        ->latest()
        ->get();
      
        return view('admin.plan.create',compact('policies'));
    }

    public function store(PlanRequest  $request)
    {
       
        $plan= Plan::create([
            "name" =>$request->name,
            "number_of_days"=>$request->number_of_days,
            "duration_unit" => $request->duration_unit,
            'price' => $request->price,
            "policy_id"=>$request->policy_id,
            'tenant_id' => auth()->user()->tenant_id,
           
         
        
         
        ]);
      

        return redirect()->route('admin.plan.index');
    }

    public function edit(Plan $plan)
    {
        $tenant = Auth::user();
        $policies = Policy::where('tenant_id', $tenant->id)
            ->latest()
            ->get();

      
        return view('admin.plan.edit', compact('plan','policies'));
    }

    public function update(PlanRequest  $request, Plan $plan)
    {
        $plan->update([
            "name" =>$request->name,
            "number_of_days"=>$request->number_of_days,
            "duration_unit" => $request->duration_unit, 
            'price' => $request->price,
            "policy_id"=>$request->policy_id,
            
        ]);
      
        return redirect()->route('admin.plan.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('admin.plan.index');
    }
}
