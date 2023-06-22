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
            $attr['main_subtitle.' . $key] = 'required';
            $attr['title_one.' . $key] = 'required';
            $attr['subtitle_one.' . $key] = 'required';
            $attr['price_one.' . $key] = 'required';
            $attr['tag_one_one.' . $key] = 'required';
            $attr['tag_one_two.' . $key] = 'required';
            $attr['tag_one_three.' . $key] = 'required';
          
        }

        $validation = Validator::make($request->all(), $attr);
      
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        $price= Price::findOrFail($price_id);
      
        $data['main_title']=$request->main_title;
        $data['main_subtitle']=$request->main_subtitle;
        $data['title_one']=$request->title_one;
        $data['subtitle_one']=$request->subtitle_one;
        $data['price_one']=$request->price_one;
        $data['tag_one_one']=$request->tag_one_one;
        $data['tag_one_two']=$request->tag_one_two;
        $data['tag_one_three']=$request->tag_one_three;
        



      
        
       
        
        $update = $price->update($data);


    return back()->with('success_message', 'Announcement was updated!');

 
    }
}
