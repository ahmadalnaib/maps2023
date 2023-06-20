<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use App\Http\Controllers\Controller;

class BoxController extends Controller
{
    //

    public function show(Box $box)
    {
        $box->load('plan'); // Eager load the associated plan
        return new BoxResource($box);
    }
}
