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
        $currentDateTime = now(); // Get the current date and time
    
        $rentals = RentalResource::collection(Rental::where('end_time', '>', $currentDateTime)->get());
    
        return $rentals->response()->setStatusCode(200);
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tenant_id' => '',
            'user_id' => '',
            'uuid'=>'',
            'system_id' => 'required',
            'box_id' => 'required',
            'plan_id' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required',
            'pincode' => 'required',
        ]);

        $rental = Rental::create($validatedData);

        $rentalResource = new RentalResource($rental);

        return $rentalResource->response()->setStatusCode(201);
    }

    public function getBySystem(Request $request, $systemUuid)
    {
        $currentDateTime = now(); // Get the current date and time
    
        $rentals = RentalResource::collection(Rental::where('system_id', $systemUuid)
            ->where('end_time', '>', $currentDateTime)
            ->get());
    
        return $rentals->response()->setStatusCode(200);
    }
    


    

}
