<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'title',
        'description',
        'duration_minutes',
        'start_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];
}
