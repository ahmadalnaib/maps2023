<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersAdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index')->with('message','User erfolgreich gelöscht ')->with('timeout', 3000);
    }


}
