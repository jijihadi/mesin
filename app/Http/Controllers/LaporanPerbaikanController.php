<?php

namespace App\Http\Controllers;
use App\Hasil_Perbaikan;
use App\Perbaikan;
use App\Mesin;
use App\User;
use PDF;
use Illuminate\Http\Request;

class LaporanPerbaikanController extends Controller
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
        $hasilperbaikans= Hasil_Perbaikan::with('perbaikan');
        $mesins=Mesin::all();
        $users=User::all();
        $perbaikans=Perbaikan::join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->where('hasil_perbaikans.status','selesai')->get();
        return view('admin.laporanPerbaikan', compact('perbaikans','hasilperbaikans','mesins','users'));
    }

    public function cari(Request $request){
        
        $tglawal=$request->input('tglawal');
        $tglakhir=$request->input('tglakhir');

        $perbaikans= Perbaikan::select()->where('perbaikans.created_at','>=',$tglawal)
        ->where('perbaikans.created_at','<=',$tglakhir)->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->where('hasil_perbaikans.status','selesai')->get();
        // dd($perbaikans);
        $mesins=Mesin::all();
        $users=User::all();
        $hasilperbaikans= Hasil_Perbaikan::with('perbaikan');
        return view('admin.laporanPerbaikan', compact('perbaikans','hasilperbaikans','mesins','users'));
    }

    public function cetakPDF($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir]);
       
        
        
         $perbaikans = Perbaikan::whereBetween('perbaikans.created_at',[$tglawal, $tglakhir])->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->where('hasil_perbaikans.status','selesai')->get();
       

         $pdf = PDF::loadView('admin.laporanPerbaikanPDF',compact('perbaikans','tglawal','tglakhir'));
         $pdf->setPaper('A4','landscape');
         return $pdf->stream('Laporan Perbaikan Mesin.pdf');
      

    }
}
