<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable=[
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
        'dateOfBirth',
        'feePayer'
    ];

    protected $casts=[
        'others' => 'array',
        'nationalId' => 'array',
        'passport' => 'array',
        'examiners' => 'array'
    ];
}
