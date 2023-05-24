<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiRentalController extends Controller
{
    //

    public function index()
    {
        $rentals = Rental::all();
        return response()->json($rentals);
    }

}
