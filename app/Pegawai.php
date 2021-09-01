<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table='pegawais';
    protected $primaryKey='id_pegawai';
    protected $fillable = ['id_pegawai','id_jabatan','nama','alamat','no_telp','status_pegawai' ];
    

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function jabatan()
    {
        return $this->hasOne('App\Jabatan','id_jabatan','id_jabatan');
    }
}
