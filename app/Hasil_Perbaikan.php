<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil_Perbaikan extends Model
{
    protected $table='hasil_perbaikans';
    protected $primaryKey='id_hasil_perbaikan';
    protected $fillable = ['id_hasil_perbaikan','id_perbaikan','id_user','tanggal_perbaikan','downtime','dilakukan_perbaikan','hasil','status'];

    public function perbaikan()
    {
        return $this->belongsTo('App\Perbaikan','id_perbaikan','id_perbaikan');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
}
