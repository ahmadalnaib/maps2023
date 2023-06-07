<?php

namespace App\Http\Controllers\Admin\Policy;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PolicyController extends Controller
{
    //

    public function index()
    {
        $tenant = Auth::user();
        $policies = Policy::where('tenant_id', $tenant->id)
        ->latest()
        ->paginate(8);

   
     return view('admin.policy.index',compact('policies'));
    }

    public function create()
    {
        return view('admin.policy.create');
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
         ]);
 
        Policy::create([
           'name'=>request('name'), 
           'tenant_id' => auth()->user()->tenant_id,
          
        ]);
        return  redirect()->route('admin.policy.index')->with('message','Policy wurde aktualisiert 🎉')->with('timeout', 3000);
    }

    public function edit($policy)
    {
        $policy = Policy::findOrFail($policy);
        
        return view('admin.policy.edit', compact('policy'));
    }

    public function update(Request $request,Policy $policy)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $policy->update([
            "name" => $request->name,
         
            
        ]);
        return redirect()->route('admin.policy.index')->with('message', 'Policy updated successfully')->with('timeout', 3000);
    }

    public function destroy(Policy $policy)
    {
      
        $policy->delete();

        return redirect()->route('admin.policy.index')->with('message', 'Policy deleted successfully')->with('timeout', 3000);
    }



}
