<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table='jabatans';
    protected $primaryKey='id_jabatan';
    protected $fillable = ['id_jabatan','nama_jabatan' ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','id_pegawai','id_pegawai');
    }
}
