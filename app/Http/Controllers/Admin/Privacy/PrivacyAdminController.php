<?php

namespace App\Http\Controllers\Admin\Privacy;

use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

        $privacy_id = $request->id;
        $attr = [];

        foreach (config('locales.languages') as $key => $val) {
            $attr['content.' . $key] = 'required';
           
         
        }

        $validation = Validator::make($request->all(), $attr);
      
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        $privacy= Privacy::findOrFail($privacy_id);
        $data['content']=$request->content;
        $update = $privacy->update($data);
    return back()->with('success', 'Privacy was updated!');

    }
}
