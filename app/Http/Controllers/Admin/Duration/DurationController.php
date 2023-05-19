<?php

namespace App\Http\Controllers\Admin\Duration;

use App\Models\Duration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DurationController extends Controller
{
    
    
    public function index()
    {
       $durations=Duration::latest()->paginate(8);
       return view('admin.duration.index',compact('durations'));
    }

    public function create()
    {
    
     return view('admin.duration.create');
    }

    public function store(Request $request)
    {
       
        $duration= Duration::create([
            "name" =>$request->name,
            "price"=>$request->price,
          
         
        ]);

        return redirect()->route('admin.duration.index');
    }
}
