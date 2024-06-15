<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Category;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class ApplicantController extends Controller
{
    //
    function delete(int $id)
    {
        Applicant::destroy($id);
        return back();
    }

    function accept(int $id)
    {
    $applicant = Applicant::find($id);
    $lastStudent=Student::latest()->first();
    if ($lastStudent!=null){
        $lastStudent=$lastStudent->id;
    }else{
        $lastStudent=0;
    }
    $nextStudent=$lastStudent+1;

    $department=Category::where('name',$applicant->department)->first();
    if ($department!=null){
        $department=$department->id;
    }else{
        $department=0;
    }

    $courseBatch=Student::orderBy('created_at','DESC')->where('course',$applicant->course)->first();
    if ($courseBatch!=null){
        $courseBatch=$courseBatch->id;
    }else{
        $courseBatch=0;
    }
    $courseBatch=$courseBatch+1;
    $year=date('y');

    $regNo='CL'.str_pad($nextStudent,2,'0',STR_PAD_LEFT).'/'.str_pad($department,2,'0',STR_PAD_LEFT).'/'.str_pad($courseBatch,2,'0',STR_PAD_LEFT).'/'.$year;
        if(Student::where('email',$applicant->email)->first()==null){
            Student::create([
                'regNumber'=>$regNo,
                'firstName'=>$applicant->firstName,
                'middleName'=>$applicant->middleName,
                'lastName'=>$applicant->lastName,
                'email'=>$applicant->email,
                'phone'=>$applicant->phone,
                'idNumber'=>$applicant->idNumber,
                'gender'=>$applicant->gender,
                'religion'=>$applicant->religion,
                'county'=>$applicant->county,
                'residence'=>$applicant->residence,
                'history'=>$applicant->history,
                'dateOfBirth'=>$applicant->dateOfBirth,
                'condition'=>$applicant->condition,
                'fatherName'=>$applicant->fatherName,
                'motherName'=>$applicant->motherName,
                'fatherPhone'=>$applicant->fatherPhone,
                'motherPhone'=>$applicant->motherPhone,
                'fatherEmail'=>$applicant->fatherEmail,
                'motherEmail'=>$applicant->motherEmail,
                'nokName'=>$applicant->nokName,
                'nokPhone'=>$applicant->nokPhone,
                'nokEmail'=>$applicant->nokEmail,
                'payerName'=>$applicant->payerName,
                'payerPhone'=>$applicant->payerPhone,
                'payerEmail'=>$applicant->payerEmail,
                'payerRelation'=>$applicant->payerRelation,
                'education'=>$applicant->education,
                'grade'=>$applicant->grade,
                'school'=>$applicant->school,
                'schoolYear'=>$applicant->schoolYear,
                'course'=>$applicant->course,
                'intake'=>$applicant->intake,
                'mode'=>$applicant->mode,
                'examiners'=>$applicant->examiners,
                'passport'=>$applicant->passport,
                'nationalId'=>$applicant->nationalId,
                'slip'=>$applicant->slip,
                'department'=>$applicant->department,
                'others'=>$applicant->others,
                'feePayer'=>$applicant->feePayer,
            ]);

        }
    if (User::where('email',$applicant->email)->first()==null){
        $student=User::create(['name' => $applicant->firstName.' '.$applicant->middleName.' '.$applicant->lastName,
            'email' => $applicant->email, 'password' => \Hash::make($applicant->phone)]);
$student->assignRole('Student');

$mailer=new PHPMailer(true);
$mailer->setFrom('info@clevers.co.ke','Clevers Schools');
$mailer->addAddress($applicant->email);
$mailer->Subject='Application Status';
$mailer->Body='Your application for '.$applicant->course.' has been accepted. You can access the student portal at https://portal.clevers.co.ke. Username is  '.$applicant->email.' and password is '.$applicant->phone;

    $mailer->send();
    $mailer->clearAddresses();
    $mailer->clearAllRecipients();

    }
    $applicant->delete();

    return back();
    }
}
