<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    function delete($id)
    {
       Blog::whereId($id)->delete();
       return back();
    }
    function createBlog(Request $request)
    {
       Blog::create([
           'title'=>$request->title,
           'description'=>$request->description,
           'poster'=>$request->organizer,
           'views'=>0,
           'content'=>$request->blog,
           'banner'=>json_decode($request->filepond,true)['path'],
           'category'=>$request->category,
       ]);
       return redirect('/blog');
    }
}
