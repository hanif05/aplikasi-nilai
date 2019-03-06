<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'matkul';
    protected $fillable = ['nama', 'kode', 'semester'];



    public function siswa(){
    	//belongsToMany arti many to many

    	return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function dosen()
    {
    	//belongsTo penggunaan 1 matkul hanya dimiliki 1 dosen
    	return $this->belongsTo(Dosen::class);
    }


}
