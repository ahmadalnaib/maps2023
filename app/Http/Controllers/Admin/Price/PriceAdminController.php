<?php

namespace App\Http\Controllers\Admin\Price;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $fields = $request->validate([
            'main_title' => 'required',
            'main_subtitle' => 'required',

            'title_one' => 'required',
            'subtitle_one' => 'required',
            'price_one' => 'required',
            'tag_one_one' => 'required',
            'tag_one_two' => 'required',
            'tag_one_three' => 'required',
            'tag_one_four' => 'required',
            'tag_one_five' => 'required',
            'tag_one_six' => 'required',

            'title_two' => 'required',
            'subtitle_two' => 'required',
            'price_two' => 'required',
            'tag_two_one' => 'required',
            'tag_two_two' => 'required',
            'tag_two_three' => 'required',
            'tag_two_four' => 'required',
            'tag_two_five' => 'required',
            'tag_two_six' => 'required',

            'title_three' => 'required',
            'subtitle_three' => 'required',
            'price_three' => 'required',
            'tag_three_one' => 'required',
            'tag_three_two' => 'required',
            'tag_three_three' => 'required',
            'tag_three_four' => 'required',
            'tag_three_five' => 'required',
            'tag_three_six' => 'required',

            
            'title_four' => 'required',
            'subtitle_four' => 'required',
            'price_four' => 'required',
            'tag_four_one' => 'required',
            'tag_four_two' => 'required',
            'tag_four_three' => 'required',
            'tag_four_four' => 'required',
            'tag_four_five' => 'required',
            'tag_four_six' => 'required',

          
        ]);

        $price = Price::first();
        dd($price);
       
        $price->update($fields);
        

    return back()->with('success', 'Plans was updated!');
    }
}
