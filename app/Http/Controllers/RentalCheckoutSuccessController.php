<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalCheckoutSuccessController extends Controller
{
    //

    public function __invoke()
    {
      return view('success');
    }
}
