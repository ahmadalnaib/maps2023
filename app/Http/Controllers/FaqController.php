<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    
    public function index()
    {

        $faq=Faq::first();
        return view('faq',compact('faq'));
    }
}
