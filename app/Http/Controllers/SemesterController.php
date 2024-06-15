<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //
    function activate($id)
    {
      Semester::whereId($id)->update(['status' => 'Active']) ;
      return back();
    }
    function deactivate($id)
    {
        Semester::whereId($id)->update(['status' => 'Inactive']) ;
        return back();
    }
    function createSemester(Request $request)
    {
      $start=Carbon::now();
      $start->setTimestamp(strtotime($request->start));
        $end=Carbon::now();
        $end->setTimestamp(strtotime($request->end));
      Semester::create([
          'startDate'=>$start, 'endDate'=>$end, 'name'=>$request->name, 'createdBy'=>auth()->id()
      ]);
      return back()->with(['type'=>'success','message'=>'Semester Created','title'=>'Success']);
    }
}
