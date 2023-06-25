<?php

namespace App\Http\Controllers\Admin\Term;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TermAdminController extends Controller
{
    //

    public function index()
    {

        $term=Term::first();
        return view('admin.term.edit',compact('term'));

    }

    public function update(Request $request)
    {
        $term_id = $request->id;
        $attr = [];

        foreach (config('locales.languages') as $key => $val) {
            $attr['content.' . $key] = 'required';
           
         
        }

        $validation = Validator::make($request->all(), $attr);
      
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        $term= Term::findOrFail($term_id);
        $data['content']=$request->content;
        $update = $term->update($data);
    return back()->with('success', 'Term was updated!');

    



    }
}
