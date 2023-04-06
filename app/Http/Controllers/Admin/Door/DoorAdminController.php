<?php

namespace App\Http\Controllers\Admin\Door;

use App\Models\Door;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoorAdminController extends Controller
{
    
     public function index()
     {
        $doors=Door::latest()->paginate(8);
        return view('admin.door.index',compact('doors'));
     }
}
