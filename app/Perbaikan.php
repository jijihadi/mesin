<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    protected $table='perbaikans';
    protected $primaryKey='id_perbaikan';
    protected $fillable = ['id_perbaikan','id_mesin','id_user','deskripsi_masalah'];

    public function mesin()
    {
        return $this->belongsTo('App\Mesin','id_mesin','id_mesin');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }

    public function hasilperbaikan()
    {
        return $this->hasOne('App\Hasil_Perbaikan');
    }
}
