<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
    	return view('frontend/index');
    }

    public function daftar()
    {
    	return view('frontend/daftar');
    }

    public function register(Request $request)
    {
    	$user = new \App\User;
		$user->level = 'siswa';
		$user->name = $request->nama_depan;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->remember_token = str_random(60);
		$user->save();

		$request->request->add ([ 'user_id' => $user->id ]);
		$data = \App\Siswa::create($request->all());

		return redirect('/');
    }
}
