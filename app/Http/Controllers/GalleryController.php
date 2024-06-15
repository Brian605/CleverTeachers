<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    //
    function deleteGallery($id)
    {
       $gallery=Gallery::find($id);
        $file=Storage::disk('public')->exists($gallery->file);
        if ($file){
            Storage::disk('public')->delete($gallery->file);
        }


       $gallery->delete();
        return back();
    }
    function createGallery(Request $request)
    {
        foreach ($request->name as $file){
            $path=$file->store('gallery','public');
           Gallery::create([  'caption'=>$request->icon,
               'file'=>$path,
               'views'=>0,
               'likes'=>0,]) ;

        }
        return back()->with(['type'=>'success','title'=>'Success','message'=>'Uploaded to gallery']);

    }

    function editCaption(Request $request)
    {
Gallery::find($request->id)->update(['caption' => $request->name]);
return back();
    }
}
