<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitRegistration extends Model
{
    use HasFactory;
    protected $fillable=[
        'unit_id', 'course_id', 'student_id', 'semester_id', 'status'
    ];
}
