<?php

namespace App\Http\Controllers;

use App\Models\Downloads;
use App\Models\PastPaper;
use Illuminate\Http\Request;

class PastPaperController extends Controller
{
    //
    function createPastPaper(Request $request)
    {
       $path=$request->file('file')->store('downloads','public');
       PastPaper::create([
           'subject'=>$request->name, 'file'=>$path, 'views'=>0, 'downloads'=>0, 'school'=>$request->category
       ]);
        return back()->with(['type'=>'success','title'=>'Success','message'=>'Past Paper Created']);

    }
    function deletePaper($id)
    {
        PastPaper::find($id)->delete();
        return back()->with(['type'=>'error','title'=>'Success','message'=>'Past Paper Deleted']);

    }
}
