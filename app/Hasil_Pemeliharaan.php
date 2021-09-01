<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hasil_Pemeliharaan extends Model
{
    protected $table='hasil_pemeliharaans';
    protected $primaryKey='id_hasil_pemeliharaan';
    protected $fillable = ['id_hasil_pemeliharaan','id_pemeliharaan','metode','hasil','status'];

    public function pemeliharaan()
    {
        return $this->hasMany('App\Pemeliharaan','id_pemeliharaan','id_pemeliharaan','tanggal_jadwal');
    }

    // public function allData(){
    //     return DB::table('hasil_pemeliharaans')
    //     ->leftJoin('pemeliharaans','pemeliharaans.id_pemeliharaan','=','hasil_pemeliharaans.id_pemeliharaan')
    //     ->get();
    // }
}
