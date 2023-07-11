<?php

namespace App\Http\Controllers\Admin\How;

use App\Models\How;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Translators\DeepLTranslator;
use Illuminate\Support\Facades\Validator;

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

        $how_id = $request->id;
        $attr = [];
        foreach (config('locales.languages') as $key => $val) {
            $attr['main_title.' . $key] = 'required';
            $attr['main_subtitle.' . $key] = 'required';
            $attr['title_one.' . $key] = 'required';
            $attr['subtitle_one.' . $key] = 'required';
            $attr['title_two.' . $key] = 'required';
            $attr['title_three.' . $key] = 'required';
            $attr['subtitle_three.' . $key] = 'required';
            $attr['title_four.' . $key] = 'required';
            $attr['subtitle_four.' . $key] = 'required';
         
         
        }

        $validation = Validator::make($request->all(), $attr);
      
        if ($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        
        $how= How::findOrFail($how_id);
      
        $data['main_title']=$request->main_title;
        $data['main_subtitle']=$request->main_subtitle;
        $data['title_one']=$request->title_one;
        $data['subtitle_one']=$request->subtitle_one;
        $data['title_two']=$request->title_two;
        $data['subtitle_two']=$request->subtitle_two;
        $data['title_three']=$request->title_three;
        $data['subtitle_three']=$request->subtitle_three;
        $data['title_four']=$request->title_four;
        $data['subtitle_four']=$request->subtitle_four;
        $data['video']=$request->video;
        
       
        
        $update = $how->update($data);


    return back()->with('success_message', 'Text wurde aktualisiert 🎉');

    }

    // private function translateFields(array $fieldsToTranslate, array $data)
    // {
    //     $translator = new DeepLTranslator();
    //     $translatedData = [];
    //     foreach (config('locales.languages') as $langKey => $item) {
    //         foreach ($fieldsToTranslate as $field) {
    //             $translatedData[$field][$langKey] = $translator->translate($data[$field], $langKey);
    //         }
    //     }
    
    //     return $translatedData;
    // }
}
