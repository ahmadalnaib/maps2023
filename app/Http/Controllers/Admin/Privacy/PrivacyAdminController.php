<?php

namespace App\Http\Controllers\Admin\Privacy;

use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyAdminController extends Controller
{
    //

    public function index()
    {
        $privacy=Privacy::first();
        return view('admin.privacy.edit',compact('privacy'));

    }

    public function update(Request $request)
    {

        $fields = $request->validate([
            'content' => 'required',
            
        
        ]);

        $privacy = Privacy::first();

        $privacy->update($fields);

    return back()->with('success', 'Privacy was updated!');

    }
}
