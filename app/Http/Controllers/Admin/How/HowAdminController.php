<?php

namespace App\Http\Controllers\Admin\How;

use App\Models\How;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HowAdminController extends Controller
{
    //
    public function index()
    {
        $how=How::first();
        return view('admin.how.edit',compact('how'));
    }


    public function update(Request $request)
    {

        $fields = $request->validate([
            'main_title' => 'required',
            'main_subtitle' => 'required',
            'title_one' => 'required',
            'subtitle_one' => 'required',
            'title_two' => 'required',
            'subtitel_two' => 'required',
            'title_three' => 'required',
            'subtitle_three' => 'required',
            'title_four' => 'required',
            'subtitle_four' => 'required',
            'video' => 'required|url',
        ]);

        $how = How::first();

        $how->update($fields);

    return back()->with('success_message', 'Announcement was updated!');

    }
}
