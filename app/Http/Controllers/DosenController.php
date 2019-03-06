<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
    	$dosen = \App\Dosen::all();


    	return view('dosen/listdosen', ['data' => $dosen]);
    }

    public function tambah(Request $request)
    {
    	$data = \App\Dosen::create($request->all());
    	

    	return redirect('/dosen')->with('berhasil', 'Data Dosen Berhasil Di Tambah');
    }

    public function profile($id)
    {

    	$dosen = \App\Dosen::find($id);


    	return view('dosen/profile', ['data' => $dosen]);
    }
}
