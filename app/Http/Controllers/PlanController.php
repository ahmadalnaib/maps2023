<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //

    public function index()
    {
        $plans=Plan::latest()->paginate(8);
        return view('admin.plan.index',compact('plans'));
    }

    public function create()
    {
        return view('admin.plan.create');
    }

    public function store(Request $request)
    {
       
        $plan= Plan::create([
            "name" =>$request->name,
            "number_of_days"=>$request->number_of_days,
            'price' => $request->price,
         
        ]);

        return redirect()->route('admin.plan.index');
    }
}
