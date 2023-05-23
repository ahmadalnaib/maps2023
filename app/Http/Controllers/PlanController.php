<?php

namespace App\Http\Controllers;

use App\Models\Door;
use App\Models\Plan;
use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    //

    public function index()
    {
        $tenant = Auth::user();
        $plans = Plan::where('tenant_id', $tenant->id)
        ->latest()
        ->paginate(8);

   
     return view('admin.plan.index',compact('plans'));
    }

    public function create()
    {
        $tenant = Auth::user();
        $lockers = Locker::where('tenant_id', $tenant->id)
        ->latest()
        ->get();
    
        $doors = Door::where('tenant_id', $tenant->id)
        ->latest()
        ->get();

        return view('admin.plan.create',compact('lockers','doors'));
    }

    public function store(Request $request)
    {
       
        $plan= Plan::create([
            "name" =>$request->name,
            "number_of_days"=>$request->number_of_days,
            'price' => $request->price,
            "locker_id"=>$request->locker_id,
            'door_id'=>$request->door_id
        
         
        ]);

        return redirect()->route('admin.plan.index');
    }
}
