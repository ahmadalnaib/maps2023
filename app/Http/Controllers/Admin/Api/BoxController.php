<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Box;
use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use App\Http\Controllers\Controller;

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

  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'tenant_id' => 'required',
        'team_id' => 'required',
        'number' => 'required',
        'box_type_id' => 'required',
        'plan_id' => 'required|string',
        'plan_id.*' => 'numeric|distinct',
        'system_id'=>'required',
        'api_id' => '',
        'status' => '',
      
       
       
    
    ]);

    $box = Box::create($validatedData);
    $planIds = explode(',', $request->plan_id);
    $box->plans()->attach($planIds);
    $boxRecource = new BoxResource($box);

    return $boxRecource->response()->setStatusCode(201);
  }



    public function show(Box $box)
    {
        $box->load('plans'); // Eager load the associated plans
        return new BoxResource($box);
    }


}
