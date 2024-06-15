<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    function addUnit(Request $request)
    {
       $department =Category::where('name',Course::find($request->courseId)->category)->first()->id ;
Unit::create([
    'name'=>$request->name,
    'course_id'=>$request->courseId,
    'department_id'=>$department,
    'icon'=>null,
    'cat1'=>$request->cat1,
    'cat2'=>$request->cat2,
    'exams'=>$request->cat3,
    'teacher_id'=>Teacher::where('userId',auth()->user()->id)->first()->id,
]);
return back();
    }
}
