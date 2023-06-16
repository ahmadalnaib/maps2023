<?php

namespace App\Http\Controllers\Admin\Price;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PriceAdminController extends Controller
{
    //

    public function index()
    {
        $price=Price::first();
        return view('admin.price.edit',compact('price'));

    }

    public function update(Request $request)
    {
        $price_id = $request->id;
        $attr = [];

        foreach (config('locales.languages') as $key => $val) {
            $attr['main_title.' . $key] = 'required';
            // $attr['main_subtitle.' . $key] = 'required';
            // $attr['title_one.' . $key] = 'required';
            // $attr['subtitle_one.' . $key] = 'required';
            // $attr['price_one.' . $key] = 'required';
            // $attr['tag_one_one' . $key] = 'required';
            // $attr['tag_one_two' . $key] = 'required';
            // $attr['tag_one_three' . $key] = 'required';
            // $attr['tag_one_four' . $key] = 'required';
            // $attr['tag_one_five' . $key] = 'required';
            // $attr['tag_one_six' . $key] = 'required';

            // $attr['title_two.' . $key] = 'required';
            // $attr['subtitle_two.' . $key] = 'required';
            // $attr['price_two.' . $key] = 'required';
            // $attr['tag_two_on' . $key] = 'required';
            // $attr['tag_two_two' . $key] = 'required';
            // $attr['tag_two_three' . $key] = 'required';
            // $attr['tag_two_four' . $key] = 'required';
            // $attr['tag_two_five' . $key] = 'required';
            // $attr['tag_two_six' . $key] = 'required';

            // $attr['title_three.' . $key] = 'required';
            // $attr['subtitle_three.' . $key] = 'required';
            // $attr['price_three.' . $key] = 'required';
            // $attr['tag_three_one' . $key] = 'required';
            // $attr['tag_three_two' . $key] = 'required';
            // $attr['tag_three_three' . $key] = 'required';
            // $attr['tag_three_four' . $key] = 'required';
            // $attr['tag_three_five' . $key] = 'required';
            // $attr['tag_three_six' . $key] = 'required';
          

            // $attr['title_four.' . $key] = 'required';
            // $attr['subtitle_four.' . $key] = 'required';
            // $attr['price_four.' . $key] = 'required';
            // $attr['tag_four_one' . $key] = 'required';
            // $attr['tag_four_two' . $key] = 'required';
            // $attr['tag_four_three' . $key] = 'required';
            // $attr['tag_four_four' . $key] = 'required';
            // $attr['tag_four_five' . $key] = 'required';
            // $attr['tag_four_six' . $key] = 'required';
          
           
         
         
        }

        $validation = Validator::make($request->all(), $attr);
      
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        $price= Price::findOrFail($price_id);
      
        $data['main_title']=$request->main_title;
        // $data['main_subtitle']=$request->main_subtitle;
        // $data['title_one']=$request->title_one;
        // $data['subtitle_one']=$request->subtitle_one;
        // $data['price_one']=$request->price_one;
        // $data['tag_one_one']=$request->tag_one_one;
        // $data['tag_one_two']=$request->tag_one_two;
        // $data['tag_one_three']=$request->tag_one_three;
        // $data['tag_one_four']=$request->tag_one_four;
        // $data['tag_one_five']=$request->tag_one_five;
        // $data['tag_one_six']=$request->tag_one_six;


        // $data['title_two']=$request->title_two;
        // $data['subtitle_two']=$request->subtitle_two;
        // $data['price_two']=$request->price_two;
        // $data['tag_two_one']=$request->tag_two_one;
        // $data['tag_two_two']=$request->tag_two_two;
        // $data['tag_two_three']=$request->tag_two_three;
        // $data['tag_two_four']=$request->tag_two_four;
        // $data['tag_two_five']=$request->tag_two_five;
        // $data['tag_two_six']=$request->tag_two_six;


        // $data['title_three']=$request->title_three;
        // $data['subtitle_three']=$request->subtitle_three;
        // $data['price_three']=$request->price_three;
        // $data['tag_three_one']=$request->tag_three_one;
        // $data['tag_three_two']=$request->tag_three_two;
        // $data['tag_three_three']=$request->tag_three_three;
        // $data['tag_three_four']=$request->tag_three_four;
        // $data['tag_three_five']=$request->tag_three_five;
        // $data['tag_three_six']=$request->tag_three_six;


        // $data['title_four']=$request->title_four;
        // $data['subtitle_four']=$request->subtitle_four;
        // $data['price_four']=$request->price_four;
        // $data['tag_four_one']=$request->tag_four_one;
        // $data['tag_four_two']=$request->tag_four_two;
        // $data['tag_four_three']=$request->tag_four_three;
        // $data['tag_four_four']=$request->tag_four_four;
        // $data['tag_four_five']=$request->tag_four_five;
        // $data['tag_four_six']=$request->tag_four_six;



      
        
       
        
        $update = $price->update($data);


    return back()->with('success_message', 'Announcement was updated!');

 
    }
}
