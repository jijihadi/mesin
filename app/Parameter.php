<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table='parameters';
    protected $primaryKey='id_parameter';
    protected $fillable = ['id_parameter','nama_parameter'];
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function pemeliharaan()
    {
        return $this->hasMany('App\Pemeliharaan','id_pemeliharaan','id_pemeliharaan');
    }
}
