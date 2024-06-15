<?php

namespace App\Http\Controllers;

use App\Models\Intake;
use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
    //
    function activate($id)
    {
        Intake::whereId($id)->update(['status' => 'Active']) ;
        return back();
    }
    function deactivate($id)
    {
        Intake::whereId($id)->update(['status' => 'Inactive']) ;
        return back();
    }
    function createIntake(Request $request)
    {
        $start=Carbon::now();
        $start->setTimestamp(strtotime($request->start));
        $end=Carbon::now();
        $end->setTimestamp(strtotime($request->end));
        Intake::create([
            'startDate'=>$start, 'endDate'=>$end, 'name'=>$request->name, 'createdBy'=>auth()->id()
        ]);
        return back()->with(['type'=>'success','message'=>'Intake Created','title'=>'Success']);
    }
}
