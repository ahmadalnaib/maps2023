<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Rental as RentalResource;
class ApiRentalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $rentals =RentalResource::collection(Rental::paginate(8));
        return $rentals->response()->setStatusCode(200);
    }

    

}
