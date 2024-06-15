<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //
    function deleteCareer($id)
    {
        Career::whereId($id)->delete();
        return back()->with(['type'=>'success','title'=>'Success','message'=>'Removed']);

    }
    function createCareer(Request $request)
    {
        $byDate=\DateTime::createFromFormat('Y-m-d',$request->applyBy);
        $today=Carbon::now();
        $today->setTimestamp($byDate->getTimestamp());

        Career::create([
            'banner'=>json_decode($request->filepond,true)['path'],
            'title'=>$request->title,
            'description'=>$request->description,
            'responsibilities'=>$request->responsibilities,
            'requirements'=>$request->requirements,
            'applyBy'=>$today,
            'maxApplications'=>$request->max,
            'fees'=>$request->fees,
        ]);
        return redirect('/careers')->with(['type'=>'success','title'=>'Success','message'=>'Posted on the site']);

    }
}
