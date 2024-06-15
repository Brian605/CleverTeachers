<?php

namespace App\Http\Controllers;

use App\Models\UnitMarks;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class UnitMarksController extends Controller
{
    //
    function addMarks(Request $request)
    {
        if ($request->semester==null || $request->student==null || $request->unit==null) {
            return back()->with(['type'=>'error','title'=>'Invalid input','message'=>'Something went wrong']);
        }

        if ($request->cat1 !=null){
            $cat1=UnitMarks::where('student_id',$request->student)
                ->where('unit_id',$request->unit)
                ->where('semester_id',$request->semester)->first();
            if ($cat1!=null){
                $cat1->cat1=$request->cat1;
                $cat1->save();
            }else{
                UnitMarks::create([
                    'student_id'=>$request->student,
                    'unit_id'=>$request->unit,
                    'semester_id'=>$request->semester,
                    'cat1'=>$request->cat1,
                    'course_id' => $request->courseId
                ]);
            }
        }

        if ($request->cat2 !=null){
            $cat2=UnitMarks::where('student_id',$request->student)
                ->where('unit_id',$request->unit)
                ->where('semester_id',$request->semester)->first();
            if ($cat2!=null){
                $cat2->cat2=$request->cat2;
                $cat2->save();
            }else{
                UnitMarks::create([
                    'student_id'=>$request->student,
                    'unit_id'=>$request->unit,
                    'semester_id'=>$request->semester,
                    'cat2'=>$request->cat2,
                    'course_id' => $request->courseId
                ]);
            }
        }

        if ($request->exams !=null){
            $exams=UnitMarks::where('student_id',$request->student)
                ->where('unit_id',$request->unit)
                ->where('semester_id',$request->semester)->first();
            if ($exams!=null){
                $exams->exams=$request->exams;
                $exams->save();
            }else{
                UnitMarks::create([
                    'student_id'=>$request->student,
                    'unit_id'=>$request->unit,
                    'semester_id'=>$request->semester,
                    'exams'=>$request->exams,
                    'course_id' => $request->courseId
                ]);
            }
        }

        return back()->with(['type'=>'success','title'=>'Success','message'=>'Marks added successfully']);

    }
}
