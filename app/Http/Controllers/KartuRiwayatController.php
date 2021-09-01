<?php

namespace App\Http\Controllers;
use App\Mesin;
use App\Perbaikan;
use App\Hasil_Perbaikan;
use PDF;
use Illuminate\Http\Request;

class KartuRiwayatController extends Controller
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
        $mesins=Mesin::all();
        return view('admin.kartuRiwayat',compact('mesins'));
    }

    public function cari(Request $request){
        
        $nama_mesins=$request->input('nama_mesin');
      
        
        $jumlah_perbaikan_mesin= Perbaikan::where('mesins.id_mesin',$nama_mesins)->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')->count();
        $mesins=$request->input('nama_mesin');
        
            $perbaikans=Perbaikan::where('mesins.id_mesin','LIKE',$nama_mesins)
            ->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')
            ->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->get();
       
        //   dd($perbaikans);
        
        
        return view('admin.kartuMesin',compact('perbaikans','jumlah_perbaikan_mesin','mesins'))->with('perbaikans',$perbaikans,$jumlah_perbaikan_mesin,$mesins);
        
    }
    public function cetakPDF($nama_mesin){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir]);
       
        
        
        $jumlah_perbaikan_mesin= Perbaikan::where('mesins.id_mesin',$nama_mesin)->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')->count();
        
        
            $perbaikans=Perbaikan::where('mesins.id_mesin','LIKE',$nama_mesin)
            ->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')
            ->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->get();
       

         $pdf = PDF::loadView('admin.kartuMesinPDF',compact('perbaikans','nama_mesin','jumlah_perbaikan_mesin'));
         $pdf->setPaper('A4','landscape');
         return $pdf->stream('Kartu Mesin.pdf');
      

    }
    // public function show()
    // {
    //     $nama_mesin=Mesin::all();
    //     $perbaikans=Perbaikan::where('mesins.id_mesin','LIKE',$nama_mesin)->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->paginate(4);
    //     return view('admin.kartuMesin');
    // }
}
