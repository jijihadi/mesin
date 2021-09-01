<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table='mesins';
    protected $primaryKey='id_mesin';
    protected $fillable = ['id_mesin','nama_mesin','kapasitas' ,'tanggal_pembelian','tahun_pembuatan' ,'periode_pakai'];

    public function pemeliharaan()
    {
        return $this->hasMany('App\Pemeliharaan','id_pemeliharaan','id_pemeliharaan');
    }
    public function perbaikan()
    {
        return $this->hasMany('App\Perbaikan','id_perbaikan','id_perbaikan');
    }
}
