<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function createCategory(Request $request)
    {
Category::create($request->except('_token'));
return back()->with(['type'=>'success','message'=>'Category Created','title'=>'Success']);
    }

    function changeCategory(Request $request)
    {
        $category=Category::find($request->id);
        $category->name=$request->name;
        $category->icon=$request->icon;
        $category->save();
        return back()->with(['type'=>'success','message'=>'Changes Saved','title'=>'Success']);
    }

    function removeCategory($id)
    {
       Category::destroy($id);
        return back()->with(['type'=>'success','message'=>'Category Deleted','title'=>'Success']);

    }
}
