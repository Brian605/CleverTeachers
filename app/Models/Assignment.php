<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable=[
        'unitId',
        'teacherId',
        'description',
        'notes',
        'attachments',
        'title',
        'marks',
        'dueDate',
        'courseId'
    ];

    protected $casts=[
        'attachments'=>'array',
    ];
}
