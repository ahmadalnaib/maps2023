<?php

namespace App\Http\Controllers\Admin\Term;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $fields = $request->validate([
            'content' => 'required',
            
        
        ]);

        $term = Term::first();

        $term->update($fields);

    return back()->with('success', 'Terms was updated!');

    }
}
