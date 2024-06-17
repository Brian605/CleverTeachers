<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class Navigator extends Controller
{
    //
    function units()
    {
        $teacher=Teacher::find(auth()->id());
        $course=Teacher::where('course',$teacher->course)->first();


       return view('pages.units',['teacher'=>$teacher,'course'=>Course::find($course->id)]);
    }
    function students()
    { $teacher=Teacher::find(auth()->id());
        $course=Teacher::where('course',$teacher->course)->first();

        return view('pages.students',['teacher'=>$teacher,'course'=>Course::find($course->id)]);
    }
    function applicationDetails(int $id)
    {
      return view('pages.application_details',['application'=>Applicant::find($id)]);
    }
    function applications()
    {
      return view('pages.applications');
    }
    function modes()
    {
      return view('pages.modes');
    }
    function exams()
    {
        $teacher=Teacher::find(auth()->id());
        $course=Teacher::where('course',$teacher->course)->first();

        return view('pages.exams',['teacher'=>$teacher,'course'=>Course::find($course->id)]);

    }
    function intakes()
    {
      return view('pages.intakes');
    }
    function gallery()
    {
       return view('pages.gallery');
    }
    function newCareer()
    {
        return view('pages.new_career');
    }

    function pastPapers()
    {
        return view('pages.pastpapers');
    }
    function assignments()
    {
        return view('pages.assignments');
    }
    function semesters()
    {
return view('pages.semesters');
    }
    function teachers()
    {
      return view('pages.teachers');
    }
    function newTeacher()
    {
        return view('pages.new_teacher');
    }
    function newBlog()
    {
        return view('pages.new_blog');
    }
    function blogs()
    {
        return view('pages.blog');
    }
    function newEvent()
    {
        return view('pages.new_event');
    }

    function passwordReset(string $token)
    {
        return view('pages.reset_password',['token'=>$token]);

    }
    function requestPage()
    {
        return view('pages.forgot_password');
    }
    function loginPage()
    {
     return view('pages.login');
    }
    function dashboard()
    {
        return view('pages.dashboard');
    }
    function newCourse()
    {
        return view('pages.new_course');
    }
    function categories()
    {
       return view('pages.categories');
    }

    function courses()
    {
       return view('pages.listing');
    }
}
