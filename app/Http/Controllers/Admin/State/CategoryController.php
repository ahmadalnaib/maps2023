<?php

namespace App\Http\Controllers\Admin\State;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    public function index()
    {

        $categories = Category::paginate(8);

        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
         ]);
 
        Category::create([
           'title'=>request('title'),
           'slug'=>request('title'),
           'user_id'=> auth()->user()->id,
           'image'=> $request->image->store('images','public'),
        ]);
        return  redirect()->route('category.admin.index')->with('message','State wurde aktualisiert 🎉')->with('timeout', 3000);
    }


    public function show(Category $category)
    {
        return view('list',['places'=>$category->places()->get()]);
    }


     public function edit(Category $category)
     {
        return  view('admin.category.edit',compact('category'));
     }

     public function update(Request $request,Category $category)
     {
        $request->validate([
            'title'=>'required',
         ]);
            $category->update([
                'title'=>request('title'),
                'slug'=>request('title')
         ]);
         return  redirect()->route('category.admin.index')->with('message','State wurde update 🎉')->with('timeout', 3000);
     }

    public function destroy(Category $category)
    {
        $category->delete();
        return  redirect()->route('category.admin.index')
            ->with('message','State wurde gelöscht 🗑');
    }
}
