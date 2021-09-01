<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $table='pemeliharaans';
    protected $primaryKey='id_pemeliharaan';
    protected $fillable = ['id_pemeliharaan','id_user','id_mesin','id_parameter','tanggal_jadwal' ];

    public function mesin()
    {
        return $this->belongsTo('App\Mesin','id_mesin','id_mesin');
    }
    public function parameter()
    {
        return $this->belongsTo('App\Parameter','id_parameter','id_parameter');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }

    public function hasilPemeliharaan()
    {
        return $this->belongsTo('App\Hasil_Pemeliharaan','id_hasil_pemeliharaan','id_hasil_pemeliharaan','hasil','metode','status');
    }

    // public function allData(){
    //     return DB::table('pemeliharaans')
    //     ->leftJoin('mesins','mesins.id_mesin','=','pemeliharaans.id_mesin')
    //     ->leftJoin('parameters','parameters.id_parameter','=','pemeliharaans.id_parameter')
    //     ->get();
    // }
}
