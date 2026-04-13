<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pracownik extends Model
{
    /** @use HasFactory<\Database\Factories\PracownikFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'position',
        'telNumb',
    ];
}
