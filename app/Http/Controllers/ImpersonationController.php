<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Http\Request;

class ImpersonationController extends Controller
{
    //

    public function leave()
    {

        if(!session()->has('impersonate')){
            abort(403);
        }
     
        auth()->login(User::withoutGlobalScope(TenantScope::class)->find(session('impersonate')));
        session()->forget('impersonate');

        return redirect('/');


    }
}
