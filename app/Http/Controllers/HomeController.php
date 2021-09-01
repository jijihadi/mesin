<?php

namespace App\Http\Controllers;
use App\User;
use App\Pemeliharaan;
use App\Hasil_Pemeliharaan;
use App\Hasil_Perbaikan;
use App\Perbaikan;
use App\Parameter;
use App\Mesin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $mesin=Mesin::count();
        $user=User::count();
        $pemeliharaan=Pemeliharaan::count();
        $perbaikan=Perbaikan::count();
        $hasil_pemeliharaans= Hasil_Pemeliharaan::all();
        // $pemeliharaans=Pemeliharaan::whereDate('tanggal_jadwal', today())->get();
        $pemeliharaans=Pemeliharaan::whereDate('tanggal_jadwal', today())
        ->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->get();
        return view('admin.home',compact('pemeliharaans','hasil_pemeliharaans','user','mesin','pemeliharaan','perbaikan'));
    }

 

   
}
