<?php

namespace App\Http\Controllers;

use App\Models\How;
use Illuminate\Http\Request;

class HowController extends Controller
{
    //

    public function index()
    {
        $how=How::first();
        return view('how',compact('how'));
    }
}
