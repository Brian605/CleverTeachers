<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable=[
        'banner',
        'title',
        'description',
        'responsibilities',
        'requirements',
        'applyBy',
        'maxApplications',
        'fees',
    ];
}
