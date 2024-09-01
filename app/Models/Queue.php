<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $table = 'queues';
    
    protected $fillable = [
        'name',
        'student_number',
        'department',
        'queue_number',
    ];
}
