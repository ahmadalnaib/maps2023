<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $rentals =UserResource::collection(User::paginate(8));
        return $rentals->response()->setStatusCode(200);
    }

    public function emailVerifiedUsers()
    {
        $users = User::whereNotNull('email_verified_at')->paginate(8);
        return UserResource::collection($users)->response()->setStatusCode(200);
    }

    public function notEmailVerifiedUsers()
    {
        $users = User::whereNull('email_verified_at')->paginate(8);
        return UserResource::collection($users)->response()->setStatusCode(200);
    }

}
