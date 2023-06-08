<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;
use App\Models\User;

class LoginController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }


    public function login()
    {
        $this->authorize('viewAny', User::class);

        $accessToken = Auth::user()->createToken('Access Token')->accessToken;
        return response([
            'User' => new UserResource(Auth::user()),
            'Access Token' => $accessToken
        ]);
    }


    
}
