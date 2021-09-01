<?php

namespace App\Http\Controllers;
use App\Perbaikan;
use App\Hasil_Perbaikan;
use App\Mesin;
use App\User;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Auth;
use PDF;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
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
        $perbaikans=Perbaikan::join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->paginate(4);
        return view('admin.perbaikan',compact('perbaikans'))->with('perbaikans',$perbaikans);
    }

    public function cari(Request $request){
        
        $tgl=$request->input('tgl');
        $status=$request->input('status');

        if($tgl=$request->input('tgl')){
            $perbaikans=Perbaikan::whereDate('perbaikans.created_at','=',$tgl)->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->paginate(4);
            
        }elseif($status=$request->input('status')) {
            
            $perbaikans=Perbaikan::orWhere('hasil_perbaikans.status','LIKE',$status)->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->paginate(4);
            
        }else{
            
            $perbaikans=Perbaikan::join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')->select('perbaikans.*','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->latest()->paginate(4);
            
        }
        
        //   dd($pemeliharaans);

       
        return view('admin.perbaikan',compact('perbaikans'))->with('perbaikans',$perbaikans);
       
    }

    public function show()
    {
        $users=User::where('role','teknisi','user')->get();
        $mesins=Mesin::all();
        return view('admin.formPerbaikan',compact('mesins','users'));
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'nama_mesin' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'max:255'],
            
            
       ]);

       $perbaikan = new Perbaikan;
       $perbaikan->id_mesin =$request->nama_mesin;
       $perbaikan->id_user =Auth::user()->id;
       $perbaikan->deskripsi_masalah =$request->deskripsi; 
       $perbaikan->save();

       $hasilperbaikan = new Hasil_Perbaikan;
       $hasilperbaikan->id_perbaikan =$perbaikan->id_perbaikan;
       $hasilperbaikan->id_user =$request->username;
       $hasilperbaikan->save();

    //    \Mail::send(new SendEmail(),function($message) use($perbaikan){
    //        $message->to($perbaikan->user->email, $perbaikan->user->username);
    //    });
    // Mail::send([new SendEmail($perbaikan)],[$perbaikan],function($message) use($perbaikan){
        //     $message->from('s9257474@gmail.com', 'CV. SUMBER NIAGA');
        //     $message->subject('Notifikasi Perbaikan Mesin Produksi CV. SUMBER NIAGA');
        //     $message->to($perbaikan->user->email);
        
        // });
       

       \Mail::to($hasilperbaikan->user->email)->send(new SendEmail($perbaikan));
       
       return redirect('admin/jadwalPerbaikan')->with('status','Data Berhasil Di Simpan');
    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
    }
    public function formEditPerbaikan($id)
    {
        $data=Perbaikan::find($id);
        $mesins=Mesin::all();
        return view('operator/formEditPerbaikan',compact('data','mesins'));
    }

    public function hasil($id)
    {
        $data=Perbaikan::find($id);
        $mesins=Mesin::all();
        $users=User::where('role','operator')->get();
        return view('teknisi/formHasilPerbaikan',compact('data','mesins','users'));
    }
    
    public function detail($id)
    {
        $data=Perbaikan::where('perbaikans.id_perbaikan',$id)->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')
        ->join('users', 'users.id','=','perbaikans.id_user')
        ->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')
        ->select('perbaikans.*','mesins.nama_mesin','users.username','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->first();
        $mesins=Mesin::all();
        $users=User::all();
        $hasil_perbaikan=Hasil_Perbaikan::all();
        
       
        return view('admin/detailPerbaikan',compact('data','mesins','users','hasil_perbaikan'));
    }
    
    public function cetakPDF($id){
        $data=Perbaikan::where('perbaikans.id_perbaikan',$id)->join('hasil_perbaikans', 'hasil_perbaikans.id_perbaikan','=','perbaikans.id_perbaikan')
        ->join('users', 'users.id','=','perbaikans.id_user')
        ->join('mesins', 'mesins.id_mesin','=','perbaikans.id_mesin')
        ->select('perbaikans.*','mesins.nama_mesin','users.username','hasil_perbaikans.tanggal_perbaikan','hasil_perbaikans.dilakukan_perbaikan','hasil_perbaikans.hasil','hasil_perbaikans.status')->first();
        $mesins=Mesin::all();
        $users=User::all();
        $hasil_perbaikan=Hasil_Perbaikan::with('perbaikan');
        
         $pdf = PDF::loadView('admin.cetakdetailPerbaikan',['data'=>$data,'mesins'=>$mesins]);
         $pdf->setPaper('A4','potrait');
         return $pdf->stream('Detail Perbaikan Mesin.pdf');
      

    }
}
