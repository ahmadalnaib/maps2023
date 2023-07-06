<?php

namespace App\Http\Controllers\Admin\Locker;


use App\Models\Place;
use App\Models\Locker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LockerRequest;
use Illuminate\Support\Facades\Auth;

class LockerAdminController extends Controller
{
    //

    public function index()
    {
        $tenant = Auth::user();
        $lockers = Locker::where('tenant_id', $tenant->id)
        ->latest()
        ->paginate(8);

   
     return view('admin.locker.index',compact('lockers'));
    }

    public function create()
    {
        $tenant = Auth::user();
        $places = Place::where('tenant_id', $tenant->id)
        ->latest()
        ->get();
        return view('admin.locker.create',compact('places'));
    }

    public function store(LockerRequest $request)
    {
        Locker::create([
            'locker_name' => $request->locker_name,
            'address' => $request->address,
            'place_id' => $request->place_id,
            'tenant_id' => Auth::id(),
        ]);
    
        return redirect()->route('admin.locker.index')->with('message', 'Locker wurde aktualisiert 🎉')->with('timeout', 3000);
    }
    


    public function edit(Locker $locker)
    {
        $tenant = Auth::user();
        $places = Place::where('tenant_id', $tenant->id)
            ->latest()
            ->get();

        return view('admin.locker.edit', compact('locker', 'places'));
    }


    public function update(LockerRequest $request, Locker $locker)
    {
        $locker->update([
            'locker_name' => $request->locker_name,
            'address' => $request->address,
            'place_id' => $request->place_id,
        ]);
    
        return redirect()->route('admin.locker.index')->with('message', 'Locker wurde update 🎉')->with('timeout', 3000);
    }
    


    public function destroy(Locker $locker)
    {
        $locker->delete();

        return redirect()->route('admin.locker.index')->with('message','Locker wurde gelöscht 🗑');
    }
}
