<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    //
    function createAssignment(Request $request)
    {
        $attachment = [];
     foreach ($request->attachment as $file) {
$attachment[]=$file->store('assignments','public');
     }
     $t=strtotime($request->dueDate);
     $c=Carbon::now();
     $c->setTimestamp($t);
     Assignment::create([
         'unitId'=>$request->unit,
         'teacherId'=>$request->teacherId,
         'description'=>$request->description,
         'attachments'=>$attachment,
         'dueDate'=>$c,
         'courseId'=>$request->courseId,
     ]);
     return back()->with(['type'=>'success','message'=>'Assignment Created Successfully']);
    }

}
