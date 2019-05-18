<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route frontend
Route::get('/', 'FrontendController@index');
Route::get('/daftar', 'FrontendController@daftar');
Route::post('/register', 'FrontendController@register');

//route login
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/proseslogin', 'AuthController@validasi');
Route::get('/logout', 'AuthController@logout');

//route Admin
Route::group(['middleware' => ['auth', 'checkLevel:admin']], function(){

	//route data siswa
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/tambah', 'SiswaController@tambah');
	Route::get('/siswa/{id}/edit', 'SiswaController@edit');
	Route::post('/siswa/{id}/update', 'SiswaController@update');
	Route::get('/siswa/{id}/hapus', 'SiswaController@hapus');
	Route::get('/siswa/{id}/profile', 'SiswaController@profile');
	Route::post('/siswa/{id}/addnilai', 'SiswaController@addnilai');
	Route::get('/siswa/{id}/{idmapel}/hapusnilai', 'SiswaController@hapusnilai');
	Route::get('/siswa/export', 'SiswaController@export');



	//route data dosen
	Route::get('/dosen', 'DosenController@index');
	Route::post('/dosen/tambah', 'DosenController@tambah');
	Route::get('/dosen/{id}/profile', 'DosenController@profile');



	//Route data Matkul
	Route::get('/matkul', 'MatkulController@index');


});

//route Siswa
Route::group(['middleware' => ['auth', 'checkLevel:admin,siswa']], function(){

	//route home
	Route::get('/home', 'HomeController@index');


});