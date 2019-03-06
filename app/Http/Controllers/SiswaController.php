<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
	public function index(request $request){

		if($request->has('cari')){

			$data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
		}
		else {
			$data_siswa = \App\Siswa::all();			
		}
    	return view('siswa/listsiswa', ['data_siswa' => $data_siswa]);

	}
	public function tambah(request $request){

		//insert tabel users
		$user = new \App\User;
		$user->level = 'siswa';
		$user->name = $request->nama_depan;
		$user->email = $request->email;
		$user->password = bcrypt('password');
		$user->remember_token = str_random(60);
		$user->save();


		//insert tabel siswa
		$request->request->add ([ 'user_id' => $user->id ]);
		$data = \App\Siswa::create($request->all());


		return redirect('/siswa')->with('berhasil', 'Data Berhasil Ditambah');
	}

	public function edit($id){

		$siswa = \App\Siswa::find($id);
		return view('siswa/edit', ['data' => $siswa]);


	}
	public function update(request $request, $id){
		//dd($request->all());
		$siswa = \App\Siswa::find($id);
		$siswa->update($request->all());

		if($request->hasFile('foto')){
			$request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
			$siswa->foto = $request->file('foto')->getClientOriginalName();
			$siswa->save();

		}

		return redirect('/siswa')->with('berhasil', 'Data Berhasil Diubah');


	}

	public function hapus($id){

		$siswa = \App\Siswa::find($id);
		$siswa->delete($siswa);
		return redirect('/siswa')->with('berhasil', 'Data Berhasil Dihapus');


	}

	public function profile($id){

		$siswa = \App\Siswa::find($id);
		$matkul = \App\Matkul::all();

		$categori = [];
		$nilai = [];

		foreach ($matkul as $mt ) {
			if($siswa->matkul()->wherePivot('matkul_id', $mt->id)->first()){
				$categori[] = $mt->nama;
				$nilai[] = $siswa->matkul()->wherePivot('matkul_id', $mt->id)->first()->pivot->nilai;
			}
		}



		return view('siswa/profile', ['data' => $siswa, 'matkul' => $matkul, 'categori' => $categori, 'nilai' => $nilai]);


	}

	public function addnilai(request $request, $idsiswa){

		$siswa = \App\Siswa::find($idsiswa);

		if($siswa->matkul()->where('matkul_id', $request->matkul)->exists()){
			return redirect('/siswa/'.$idsiswa.'/profile')->with('error', 'Data Nilai Sudah Ada!');
		}
		$siswa->matkul()->attach($request->matkul, ['nilai' => $request->nilai]);
		return redirect('/siswa/'.$idsiswa.'/profile')->with('berhasil', 'Data Nilai Berhasil Di Input');
		

	}


	public function hapusnilai($idsiswa, $idmatkul){

		$siswa = \App\Siswa::find($idsiswa);

		$siswa->matkul()->detach($idmatkul);

		return redirect()->back()->with('berhasil', 'Data Nilai Berhasil Di Hapus');


	}

	public function export() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }
}
