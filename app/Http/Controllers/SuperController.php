<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use App\Models\Locker;
use App\Models\Tenant;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    //

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
            $lockersCount = Locker::count();
            return view('super.dashboard', [
                'basicUsers' => $basicUsers,
                'tenantUsers' => $tenantUsers,
                'loginsCount' => $loginsCount,
                'lockersCount'=>$lockersCount,
            ]);
        }
    }
}
