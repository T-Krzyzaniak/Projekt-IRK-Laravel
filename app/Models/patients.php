<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    /** @use HasFactory<\Database\Factories\PatientsFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'telNumb',
        'PESEL',
        'age',
        'pracownik_id',
    ];
}
