<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function autoComplete(Request $request)
    {
        if($request->address){
            $input=$request->address;
            $data=Place::where('address','LIKE',"%$input%")->get();
            $output='<ul class="bg-gray-100 rounded px-6 py-6 cursor-pointer">';
            foreach($data as $row){
                $output .='<li class="flex items-center justify-between border-b-4 border-red-200 p-4 hover:bg-gray-400  rounded-md ">'
                .$row->address .'<svg width="30" height="30" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35 6.5625C28.8437 6.56636 22.9407 9.01364 18.5876 13.3668C14.2345 17.7199 11.7872 23.6229 11.7833 29.7792C11.7833 38.85 17.5146 47.1333 23.1583 53.1125C26.5788 56.774 30.355 60.0862 34.4312 63L35 63.3938L35.5687 63C39.645 60.0862 43.4212 56.774 46.8417 53.1125C52.4854 47.075 58.2167 38.8063 58.2167 29.7792C58.2128 23.6229 55.7655 17.7199 51.4124 13.3668C47.0593 9.01364 41.1563 6.56636 35 6.5625Z" stroke="#F02E2E" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M45.8062 34.9708C49.0118 34.9708 51.6104 32.3722 51.6104 29.1667C51.6104 25.9611 49.0118 23.3625 45.8062 23.3625C42.6007 23.3625 40.0021 25.9611 40.0021 29.1667C40.0021 32.3722 42.6007 34.9708 45.8062 34.9708Z" stroke="#F02E2E" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M24.2667 34.9708C27.4722 34.9708 30.0708 32.3722 30.0708 29.1667C30.0708 25.9611 27.4722 23.3625 24.2667 23.3625C21.0611 23.3625 18.4625 25.9611 18.4625 29.1667C18.4625 32.3722 21.0611 34.9708 24.2667 34.9708Z" stroke="#F02E2E" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M42.4667 19.0458L34.5917 29.1667H24.2667L32.1708 19.0458H42.4667Z" stroke="#F02E2E" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M45.8062 29.1667L41.2271 15.2833H37.8583M31.4125 15.8375L34.5917 29.1667M29.3562 15.8375H33.6437M14.3792 40.4979H55.6208" stroke="#F02E2E" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                '. '</li> ' ;
            }
            $output .='</ul>';
            return $output;

        }
    }

    public function show(Request $request)
    {
      $places=Place::search($request)->get();
      return view('list',compact('places'));

    }
}
