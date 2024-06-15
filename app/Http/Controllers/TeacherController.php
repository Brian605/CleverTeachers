<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class TeacherController extends Controller
{
    //
    function createTeacher(Request $request)
    {
       $user=User::where('email',$request->email)->first();
       if ($user==null){
           $user=User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => \Hash::make($request->phone)
           ]);
           $user->assignRole('Lecturer');
       }
       if (!$user->hasRole('Lecturer')){
           $user->assignRole('Lecturer');
       }
       $teacher=Teacher::where('email',$request->email)->first();
       if ($teacher==null){
           Teacher::create([
               'name'=>$request->name,
               'course'=>$request->course,
               'department'=>$request->department,
               'phone'=>$request->phone,
               'email'=>$request->email,
               'image'=>json_decode($request->filepond,true)["path"],
               'userId'=>$user->id,
           ]);
           $mailer=new PHPMailer();
           $mailer->setFrom('noreply@clevers.co.ke','Clevers Schools');
           $mailer->addAddress($request->email);
           $mailer->Body='Your teacher account has been created. Your email is '.$request->email.' and your password is '.$request->phone.'.You can log in at https://teachers.clevers.co.ke';
           $mailer->Subject='Your Teaching Account';
           $mailer->send();
           $mailer->clearAddresses();
           $mailer->clearAllRecipients();
           return back()->with(['type'=>'success','message'=>'The log in details have been sent to the provided email','title'=>'Teacher Created']);
       }
        return back()->with(['type'=>'error','message'=>'A teacher with this email already exists','title'=>'Failed to create Teacher']);


    }
}
