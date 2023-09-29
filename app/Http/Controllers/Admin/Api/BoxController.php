<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Box;
use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BoxController extends Controller
{
    //

        //
  public function __construct()
  {
      $this->middleware('auth:api');
  }

  public function index()
  {
      $boxes =BoxResource::collection(Box::all());
      return $boxes->response()->setStatusCode(200);
  }

  
  public function storeBulk(Request $request)
  {
   
    $validatedData = Validator::make($request->all(), [
               '*.occupied' => 'boolean',
               '*.defective' => 'boolean',
               '*.rental_uuid' => 'nullable|uuid',
               '*.box_id' => 'uuid'
    ]);
   
    // Log::info('id of client: '. $request->ip());
    // Log::info($request->httpHost() );
    if ($validatedData->fails()) {
        return response()->json(['error' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }
 
      $boxes = [];
      $updatedSystemIds = [];

      foreach ($validatedData->getData() as $data) {
        foreach ($data as $item){
        $box = Box::findOrFail($item['box_id']);
        $item['id'] = $item['box_id'];
        unset($item['box_id']);
        $box->update($item);
        // in live comment this code is just for test 
        // Log::info('box item: '. json_encode($item, true));
        // ^^^
        $system = $box->system()->first();
        if ($system) {
            $updatedSystemIds[$system->id] = $system;
        }
          $boxes[] =$box;
        }
      }
   
     if ($updatedSystemIds){
        foreach($updatedSystemIds as $system){
          $system->update(['last_status' => now()]);
          Log::channel('system_updates')->info('API call to update Systems ' .  $system->id . ' last_status at ' . now());

        }
      }
  
      $boxResources = BoxResource::collection($boxes);
  
      return $boxResources->response()->setStatusCode(201);
  }
  

  


public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'occupied' => 'boolean',
        'defective' => 'boolean',
        'rental_uuid' => 'nullable|uuid',
    ]);

    // Check for validation errors
    if ($validator->fails()) {
        return response()->json(['error' => 'Validation failed', 'errors' => $validator->errors()], 422);
    }

    // Find the box by ID
    $box = Box::findOrFail($id);

    // Update the box attributes with the validated data
    $box->update($validator->validated());

    // Return a success response
    return response()->json(['data' => ['success' => true]]);
}


    public function show(Box $box)
    {
        $box->load('plans'); // Eager load the associated plans
        return new BoxResource($box);
    }


}
