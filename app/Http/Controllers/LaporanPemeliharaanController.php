<?php

namespace App\Http\Controllers;
use App\Mesin;
use App\Parameter;
use App\Hasil_Pemeliharaan;
use App\Pemeliharaan;
use App\User;
use PDF;
use Illuminate\Http\Request;

class LaporanPemeliharaanController extends Controller
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
        $hasilpemeliharaans= Hasil_Pemeliharaan::with('pemeliharaan');
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $users=User::all();
        $pemeliharaans=Pemeliharaan::join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->where('hasil_pemeliharaans.status','selesai')->get();
        return view('admin.laporanPemeliharaan', compact('pemeliharaans','hasilpemeliharaans','mesins','parameter','users'));
        
    }
    
    public function cari(Request $request){
        
        $tglawal=$request->input('tglawal');
        $tglakhir=$request->input('tglakhir');

        

        $pemeliharaans= Pemeliharaan::select()->where('tanggal_jadwal','>=',$tglawal)
        ->where('tanggal_jadwal','<=',$tglakhir)->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->where('hasil_pemeliharaans.status','selesai')->get();
        
      
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $users=User::all();
        $hasilpemeliharaans= Hasil_Pemeliharaan::with('pemeliharaan');
        return view('admin.laporanPemeliharaan', compact('pemeliharaans','hasilpemeliharaans','mesins','parameter','users'));
    }
   

    public function cetakPDF($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir]);
       
        
        
         $pemeliharaans = Pemeliharaan::whereBetween('tanggal_jadwal',[$tglawal, $tglakhir])->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->where('hasil_pemeliharaans.status','selesai')->get();
       

         $pdf = PDF::loadView('admin.laporanPemeliharaanPDF',compact('pemeliharaans','tglawal','tglakhir'));
         $pdf->setPaper('A4','landscape');
         return $pdf->stream('Laporan Pemeliharaan Mesin.pdf');
      

    }
}
