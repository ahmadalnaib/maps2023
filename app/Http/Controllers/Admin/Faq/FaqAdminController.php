<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

        $faq_id = $request->id;
        $attr = [];
        foreach (config('locales.languages') as $key => $val) {
            $attr['question_one.' . $key] = 'required';
            $attr['answer_one.' . $key] = 'required';
            $attr['question_two.' . $key] = 'required';
            $attr['answer_two.' . $key] = 'required';
            $attr['question_three.' . $key] = 'required';
            $attr['answer_three.' . $key] = 'required';
            $attr['question_four.' . $key] = 'required';
            $attr['answer_four.' . $key] = 'required';
            $attr['question_five.' . $key] = 'required';
            $attr['answer_five.' . $key] = 'required';
            $attr['question_six.' . $key] = 'required';
            $attr['answer_six.' . $key] = 'required';   
            $attr['question_seven.' . $key] = 'required';
            $attr['answer_seven.' . $key] = 'required';        
            $attr['question_eight.' . $key] = 'required';
            $attr['answer_eight.' . $key] = 'required';   
         
        }

        $validation = Validator::make($request->all(), $attr);
      
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        $faq= Faq::findOrFail($faq_id);
      
        $data['question_one']=$request->question_one;
        $data['answer_one']=$request->answer_one;
        $data['question_two']=$request->question_two;
        $data['answer_two']=$request->answer_two;
        $data['question_three']=$request->question_three;
        $data['answer_three']=$request->answer_three;
        $data['question_four']=$request->question_four;
        $data['answer_four']=$request->answer_four;
        $data['question_five']=$request->question_five;
        $data['answer_five']=$request->answer_five;
        $data['question_six']=$request->question_six;
        $data['answer_six']=$request->answer_six;
        $data['question_seven']=$request->question_seven;
        $data['answer_seven']=$request->answer_seven;
        $data['question_eight']=$request->question_eight;
        $data['answer_eight']=$request->answer_eight; 
        
        $update = $faq->update($data);


    return back()->with('success_message', 'Faq wurde aktualisiert 🎉');

    }

}
