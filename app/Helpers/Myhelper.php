<?php


function ranking5Besar()
{
	$siswa = \App\Siswa::all();
	$siswa->map(function($data_s){
		$data_s->rata2 = $data_s->rata2nilai();

		return $data_s;
	});

	$siswa = $siswa->sortByDesc('rata2')->take(5);

	return $siswa;
}

function totalsiswa()
{
	return \App\Siswa::count();
}

function totaldosen()
{
	return \App\Dosen::count();
}

function alertsukses()
{
	 alert()->success('Berhasil','Data Berhasil Di Simpan' );
}