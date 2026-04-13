<?php

namespace App\Http\Controllers;

use App\Models\Pracownik;
use Illuminate\Http\Request;

class PracownikController extends Controller
{
    public function index()
    {
        return view('pracownik.index');
    }
     public function create()
    {
        return view('pracownik.create');
    }
    public function edit(Pracownik $pracownik)
{
    return view('pracownik.edit', compact('pracownik'));
}

}

