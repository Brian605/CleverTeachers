<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    //
    function departmentCourses($department)
    {
        $department=Category::find($department);
        return \Response::json(Course::where('category',$department->name)->get());
    }
    function deactivate($id)
    {

        Course::whereId($id)
            ->update(['status'=>'Inactive']);
        return back()->with(['type'=>'success','message'=>'Course Deactivated','title'=>'Success']);
    }
    function activateC($id)
    {

        Course::whereId($id)
            ->update(['status'=>'Active']);
        return back()->with(['type'=>'success','message'=>'Course Activated','title'=>'Success']);
    }
    function createCourse(Request $request)
    {
        $preview=json_decode($request->filepond,true);
        $preview=$preview['path'];
        $curriculum=json_decode($request->curriculum,true);
        $curriculum=$curriculum['path'];
  Course::create(['title'=>$request->title,
            'description'=>$request->description,
            'status'=>'Active',
            'duration'=>$request->duration,
            'lecs'=>$request->lecs,
            'fees'=>$request->fees,
            'certificate'=>$request->certificate,
            'preview'=>$preview,
            'video'=>$request->video,
            'curriculum'=>$curriculum,
            'grade'=>$request->grade,
            'code'=>$request->code,
            'category'=>$request->category]);

  return redirect('/listing')->with(['type'=>'success','message'=>'Course Created And Activated','title'=>'Success']);

    }
    function uploadTaskFile(Request $request): ?JsonResponse
    {
        $files=$request->allFiles();
        if (empty($files)){
            abort(422,"No files selected");
        }

        $requestKey = array_key_first($files);
        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        $path=$file->store("tasks",'public');

        return response()->json(["path"=>$path]);

    }

    function removeTaskFile(Request $request)
    {
        Log::error(json_encode($request->all()));
    }
}
