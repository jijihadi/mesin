<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $primaryKey='id';
     protected $fillable = ['id','id_pegawai','email', 'password','username','role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pemeliharaan()
    {
        return $this->hasMany('App\Pemeliharaan');
    }
    public function perbaikan()
    {
        return $this->hasMany('App\Perbaikan','id_perbaikann','id_perbaikan');
    }
    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai','id_pegawai','id_pegawai');
    }

    public function hasilperbaikan()
    {
        return $this->belongsTo('App\Hasil_Perbaikan');
    }
}
