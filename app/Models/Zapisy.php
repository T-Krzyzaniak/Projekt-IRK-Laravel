<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapisy extends Model
{
    /** @use HasFactory<\Database\Factories\ZapisyFactory> */
    use HasFactory;
    protected $fillable = [
        'course_id',
        'course_name',
        'candidate_id',
        'candidate_name',
        'candidate_surname',
        'status', 
        'user_id',
    ];
}
