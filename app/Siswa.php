<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan', 'nama_belakang', 'jk', 'agama', 'alamat', 'user_id', 'foto'];





    public function getFoto(){

		if(!$this->foto){

			return asset('img/default.jpg');

		}

		return asset('img/'.$this->foto);
	}


	public function matkul(){

		return $this->belongsToMany(Matkul::class)->withPivot(['nilai'])->withTimeStamps();


	}

	public function rata2nilai()
	{
		$total = 0;
		$hitung = 0;
		
		
			foreach ($this->matkul as $matkul) {
				$total = $total + $matkul->pivot->nilai - 1;
				$hitung++;
			}
		
		return round($total/$hitung);
		
	}

	public function namalengkap()
	{
		return $this->nama_depan. ' ' .$this->nama_belakang;
	}
    
}

	