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

    public function show(Box $box)
    {
        $box->load('plans'); // Eager load the associated plans
        return new BoxResource($box);
    }


}
