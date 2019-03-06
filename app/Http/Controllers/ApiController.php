<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id){

    	$siswa = \App\Siswa::find($id);

    	$siswa->matkul()->updateExistingPivot($request->pk, ['nilai' => $request->value]);

    }

    //Dosen
    public function editnama(request $request, $id)
    {
    	$dosen = \App\Dosen::find($id);

    	$dosen->update($request->all());

    }
}
