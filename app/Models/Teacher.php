<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'course',
        'department',
        'gender',
        'phone',
        'email',
        'address',
        'image',
        'userId',
    ];
}
