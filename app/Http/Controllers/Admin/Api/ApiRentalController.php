<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\AdditionalRental;
use Illuminate\Support\Facades\Log;
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

       
        $rental = Rental::updateOrCreate(
            ['uuid' => $validatedData['uuid']],
            $validatedData
        );

        $rentalResource = new RentalResource($rental);

        return $rentalResource->response()->setStatusCode(201);
    }


    public function extendRental(Request $request, $rentalUuid)
    {
        $validatedData = $request->validate([
            'user_id' => '',
            'end_time' => 'required',
            'price' => 'required',
        ]);
    
        $rental = Rental::where('uuid', $rentalUuid)->firstOrFail();
        $rental->end_time = $validatedData['end_time'];
        $rental->save();

    
        $additionalRental = AdditionalRental::create([
            'user_id' => $validatedData['user_id'],
            'rental_uuid' => $rental->uuid,
            'end_time' => $validatedData['end_time'],
            'price' => $validatedData['price'],
            'datetime' => now(),
        ]);
      $formattedDatetime = date("Y-m-d H:i:s", strtotime($additionalRental->datetime));
        return response()->json([
            'message' => 'Rental extended successfully',
            'rental_uuid' => $rental->uuid,
            'user_id' => $validatedData['user_id'],
            'end_time' => $validatedData['end_time'],
            'price' => $validatedData['price'],
            'datetime' => $formattedDatetime,
        ], 201);
        
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
