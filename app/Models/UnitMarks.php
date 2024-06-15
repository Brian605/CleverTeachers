<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMarks extends Model
{
    use HasFactory;
    protected $fillable=[
        'unit_id', 'student_id', 'semester_id', 'cat1', 'cat2', 'exams', 'total', 'course_id'
    ];
}
