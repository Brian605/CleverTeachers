<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'course_id',
        'department_id',
        'icon',
        'cat1',
        'cat2',
        'exams',
        'teacher_id'
    ];
}
