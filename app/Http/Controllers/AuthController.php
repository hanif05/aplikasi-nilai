<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
    	return view('auth/login');
    }


    function validasi(Request $request){

    	if(Auth::attempt($request->only('email', 'password'))){

    		return redirect('/home');

    	}

    	return redirect('/');

    }

    function logout(){

    	Auth::logout();
    	
    	return redirect('/');




    }
}
