<?php

namespace App\Http\Controllers;

use App\Models\Downloads;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    //
    function createDownload(Request $request)
    {
        $path=$request->file('file')->store('downloads','public');
        Downloads::create([
            'name'=>$request->name,
            'file'=>$path,
            'views'=>0,
            'downloads'=>0,
        ]);
        return back()->with(['type'=>'success','title'=>'Success','message'=>'Download Created']);
    }

    function deleteDownload($id)
    {
       Downloads::find($id)->delete();
        return back()->with(['type'=>'error','title'=>'Success','message'=>'Download Deleted']);

    }
}
