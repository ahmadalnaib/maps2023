<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersAdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.users.index');
    }
}
