<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    //

    public function index()
    {
        
            $price=Price::first();
            return view('price',compact('price'));
        
    }
}
