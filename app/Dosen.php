<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $fillable = ['nama', 'telp', 'alamat', 'foto'];


    public function matkul()
    {
    	//hasMany penggunaan 1 dosen memiliki banyak matkul one to many
    	return $this->hasMany(Matkul::class);
    }

    public function getfoto()
    {
    	if(!$this->foto){
    		return asset('/img/default.jpg');
    	}
    	return asset('/img'.$this->foto);
    }
}
