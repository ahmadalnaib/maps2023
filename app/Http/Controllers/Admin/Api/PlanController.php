<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;

class PlanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
        $plans =PlanResource::collection(Plan::paginate(8));
        return $plans->response()->setStatusCode(200);
    }
}
