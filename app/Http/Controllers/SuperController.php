<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
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
            $subscribersCount = Tenant::count();
            $usersCount = User::count();
            // $usersCount = User::where('role_id', 1)->count();
            $loginsCount = Login::count();
            return view('super.dashboard', [
                'subscribersCount' => $subscribersCount,
                'usersCount' => $usersCount,
                'loginsCount' => $loginsCount,
            ]);
        }
    }
}
