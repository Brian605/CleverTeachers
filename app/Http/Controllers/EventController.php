<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    function activate($id)
    {
        Event::whereId($id)->update(['status'=>'Active']);
        return back();
    }
    function deactivate($id)
    {
        Event::whereId($id)->update(['status'=>'Expired']);
        return back();
    }
    function delete($id)
    {
        Event::whereId($id)->delete();
        return back();
    }
    function newEvent(Request $request)
    {
        $bann=json_decode($request->filepond,true)['path'];
       Event::create(['title' => $request->title,
            'description'=>$request->description,
            'category'=>$request->category,
            'organizer'=>$request->organizer,
            'location'=>$request->location,
            'date'=>Carbon::createFromFormat('Y-m-d',$request->date),
            'startTime'=>Carbon::createFromFormat('H:i',$request->start),
            'endTime'=>Carbon::createFromFormat('H:i',$request->end),
            'cost'=>$request->cost,
            'sponsors'=>$request->sponsors,
            'objectives'=>$request->objective,
            'banner'=>$bann,
            'status'=>'Active']);
        return redirect('/events');
    }
}
