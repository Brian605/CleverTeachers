<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'regNumber',
        'kcpeNumber',
        'firstName',
        'middleName',
        'lastName',
        'email',
        'phone',
        'idNumber',
        'gender',
        'religion',
        'county',
        'residence',
        'history',
        'dateOfBirth',
        'condition',
        'fatherName',
        'motherName',
        'fatherPhone',
        'motherPhone',
        'fatherEmail',
        'motherEmail',
        'nokName',
        'nokPhone',
        'nokEmail',
        'payerName',
        'payerPhone',
        'payerEmail',
        'payerRelation',
        'education',
        'grade',
        'school',
        'schoolYear',
        'course',
        'intake',
        'mode',
        'examiners',
        'passport',
        'nationalId',
        'slip',
        'department',
        'others',
        'feePayer',
    ];
    protected $casts=[
        'others' => 'array',
        'nationalId' => 'array',
        'passport' => 'array',
        'examiners' => 'array'
    ];
}
