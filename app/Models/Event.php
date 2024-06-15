<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'description_short',
        'category',
        'organizer',
        'location',
        'date',
        'startTime',
        'endTime',
        'cost',
        'sponsors',
        'objectives',
        'banner',
        'status'
    ];

    protected $casts=[
        'sponsors' => 'array',
        'objectives' => 'array',
    ];
}
