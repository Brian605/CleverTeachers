<?php

namespace App\Http\Controllers;

use App\Models\Examiner;
use Illuminate\Http\Request;

class ExaminerController extends Controller
{
    //
    function createExaminer(Request $request)
    {
        Examiner::create([
            'name'=>$request->name,
            'icon'=>$request->icon,
        ]);
        return back();

    }
    function deleteExaminer($id){
        Examiner::where('id',$id)->delete();
        return back();
    }
}
