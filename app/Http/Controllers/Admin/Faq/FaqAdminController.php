<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqAdminController extends Controller
{
    //

    public function index()
    {
        $faq=Faq::first();
        return view('admin.faq.edit',compact('faq'));
    }

    public function update(Request $request)
    {

        $fields = $request->validate([
            'question_one' => 'required',
            'answer_one' => 'required',
        
            'question_two' => 'required',
            'answer_two' => 'required',
        
            'question_three' => 'required',
            'answer_three' => 'required',
        
            'question_four' => 'required',
            'answer_four' => 'required',
        
            'question_five' => 'required',
            'answer_five' => 'required',
        
            'question_six' => 'required',
            'answer_six' => 'required',
        
            'question_seven' => 'required',
            'answer_seven' => 'required',
        
            'question_eight' => 'required',
            'answer_eight' => 'required',
        
            'question_nine' => 'required',
            'answer_nine' => 'required',
        
            'question_ten' => 'required',
            'answer_ten' => 'required',
        
        ]);

        $faq = Faq::first();

        $faq->update($fields);

    return back()->with('success', 'FAQ was updated!');

    }
}
