<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {

    	$matkul = \App\Matkul::all();

    	return view('matkul/listmatkul', ['data' => $matkul]);
    }
}
