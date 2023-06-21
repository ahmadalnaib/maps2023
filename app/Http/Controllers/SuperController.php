<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Door;
use App\Models\Plan;
use App\Models\User;
use App\Models\Login;
use App\Models\Place;
use App\Models\Locker;
use App\Models\Rental;
use App\Models\Report;
use App\Models\System;
use App\Models\Tenant;
use App\Models\Category;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'role:super']);
    }
    
    

    public function show()
    {
        if (! auth()->check()) {
            return view('welcome');
        } else {
            if(session()->has('tenant_id')) {
                return view('dashboard');
            }
            
            $basicUsers =  User::where('role', 'basic')->count();
             $tenantUsers = User::where('role', 'admin')->count();
            $loginsCount = Login::count();
            $lockersCount = System::count();
            $citycount = Category::count();
            $rentCount=Rental::count();
            $doorCount=Box::count();
            $placeCount=Place::count();
            $planCount=Plan::count();
            $errorCount=Report::count();
            
            return view('super.dashboard', [
                'basicUsers' => $basicUsers,
                'tenantUsers' => $tenantUsers,
                'loginsCount' => $loginsCount,
                'lockersCount'=>$lockersCount,
                'citycount'=>$citycount,
                'rentCount'=>$rentCount,
                'doorCount'=>$doorCount,
                'placeCount'=>$placeCount,
                'planCount'=>$planCount,
                'errorCount'=>$errorCount,

              
            ]);
        }
    }
}
