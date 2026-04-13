<?php

namespace App\Http\Controllers;

use App\Models\patients;
use Illuminate\Http\Request;

class patientsController extends Controller
{
     public function create()
    {
        return view('patients.create');
    }

}