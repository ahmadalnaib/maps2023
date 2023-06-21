<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SystemResource;

class SystemController extends Controller
{
    //
  public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
        $systems =SystemResource::collection(System::all());
        return $systems->response()->setStatusCode(200);
    }

    public function show($id)
{
    $system = System::findOrFail($id);
    return new SystemResource($system);
}


}
