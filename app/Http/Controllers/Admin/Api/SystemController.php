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
        $systems =SystemResource::collection(System::paginate(8));
        return $systems->response()->setStatusCode(200);
    }

}
