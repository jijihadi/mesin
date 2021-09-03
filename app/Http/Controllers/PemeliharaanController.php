<?php

namespace App\Http\Controllers;
use App\Pemeliharaan;
use App\Hasil_Pemeliharaan;
use App\Mesin;
use App\User;
use App\Auth;
use App\Parameter;
use PDF;
use App\Jobs\SendLateEmail;
use App\Mail\MailPemeliharaan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class PemeliharaanController extends Controller
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
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $users=User::all();
        $hasil_pemeliharaans= Hasil_Pemeliharaan::all();
        // $pemeliharaans=Pemeliharaan::with('mesin','hasilPemeliharaan','parameter','user')->latest()->paginate(4);
        $pemeliharaans=Pemeliharaan::join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->latest()->paginate(4);
        return view('admin.pemeliharaan', compact('pemeliharaans','hasil_pemeliharaans','mesins','parameter','users'))->with('pemeliharaans',$pemeliharaans);
    }

    public function cari(Request $request){
        
        $tgl=$request->input('tgl');
        $nama_parameter=$request->input('nama_parameter');
        $status=$request->input('status');

        if($tgl=$request->input('tgl')){
            
            $pemeliharaans= Pemeliharaan::select()->whereDate('pemeliharaans.tanggal_jadwal','=',$tgl)
            ->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')
            ->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->latest()->paginate(4);
            
        }elseif($nama_parameter=$request->input('nama_parameter'))  {
            
            $pemeliharaans= Pemeliharaan::select()
            ->orWhere('parameters.id_parameter','LIKE',$nama_parameter)->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')
            ->join('parameters', 'parameters.id_parameter','=','pemeliharaans.id_parameter')
            ->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->latest()->paginate(4);
            
        }elseif($status=$request->input('status')) {
            
            $pemeliharaans= Pemeliharaan::select()->orWhere('hasil_pemeliharaans.status','LIKE',$status)->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')
            ->join('parameters', 'parameters.id_parameter','=','pemeliharaans.id_parameter')
            ->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->latest()->paginate(4);
            
        }else{

            $pemeliharaans=Pemeliharaan::join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')->select('pemeliharaans.*','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')->latest()->paginate(4);
        }
        
    //   dd($pemeliharaans);
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $users=User::all();
        $hasil_pemeliharaans= Hasil_Pemeliharaan::all();
        return view('admin.pemeliharaan', compact('pemeliharaans','hasil_pemeliharaans','mesins','parameter','users'))->with('pemeliharaans',$pemeliharaans);
       
    }

    public function show()
    {
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $users=User::where('role','operator','user')->get();
        return view('admin.formPemeliharaan',compact('mesins','parameter','users'));
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'nama_mesin' => ['required', 'string', 'max:255'],
            'nama_parameter' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'tanggal_jadwal' => ['required'],
            
       ]);

       $pemeliharaan = new Pemeliharaan;
       $pemeliharaan->id_mesin =$request->nama_mesin;
       $pemeliharaan->id_parameter =$request->nama_parameter;
       $pemeliharaan->id_user =$request->username;
       $pemeliharaan->tanggal_jadwal =$request->tanggal_jadwal;
       $pemeliharaan->save();

       $hasilpemeliharaan = new Hasil_Pemeliharaan;
       $hasilpemeliharaan->id_pemeliharaan =$pemeliharaan->id_pemeliharaan;
       $hasilpemeliharaan->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');

    $to = Carbon::createFromFormat('Y-m-d H:i:s', $request->tanggal_jadwal);
    $from = Carbon::createFromFormat('Y-m-d H:s:i', date('Y-m-d H:s:i'));
    $diff = $to->diffInMinutes($from);
    // return dd($diff);
    
    $when = $to;

    $details['to'] = $request->tanggal_jadwal;
    $details['email'] = $pemeliharaan->user->email;
    $details['isi'] = $pemeliharaan;
    
    
    dispatch(new \App\Jobs\SendLateEmail($details))->delay($to);
    // \SendLateMail::dispatch($detail);
    
    // echo $when;
    // dd($details);
    
    return redirect('admin/jadwalPemeliharaan')->with('status','Data Berhasil Di Simpan');
       
    }    

    public function test()
    {
        echo Carbon::now()->addMinutes(10);
    }

    // public function delete($id)
    // {
        
    //     $pemeliharaan=Pemeliharaan::where('id',$id)->delete();
        // return redirect('admin/jadwalPemeliharaan')->with('delete','Data Berhasil Di Hapus');
        
    // }
    
    // public function edit(Request $request, $id=null)
    // {
    //     if($request->isMethod('post')){
    //         $pemeliharaans=$request->all();
        
    //         Pemeliharaan::where(['id'=>$id])->update(['id_mesin'=>$pemeliharaans['merk_mesin'],'tanggal_jadwal'=>$pemeliharaans['tanggal_jadwal'],'id_pointcek'=>$pemeliharaans['point_cek']] );
    //         return redirect('admin/jadwalPemeliharaan')->with('status','Data Berhasil Di Ubah');
    //     }
    // }
 
    public function formEditPemeliharaan($id)
    {
        $data=\App\Pemeliharaan::find($id);
        $parameters=Parameter::all();
        $mesins=Mesin::all();
        $users=User::where('role','operator')->get();
        return view('teknisi.formEditPemeliharaan',compact('data','parameters','mesins','users'));
    }
    
    public function detail($id)
    {
        $data=Pemeliharaan::where('pemeliharaans.id_pemeliharaan',$id)->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')
        ->join('mesins', 'mesins.id_mesin','=','pemeliharaans.id_mesin')
        ->select('pemeliharaans.*','mesins.nama_mesin','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')
        ->first();
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $hasil_pemeliharaans= Hasil_Pemeliharaan::with('pemeliharaan');
        $users=User::all();
        return view('admin/detailPemeliharaan',compact('data','parameter','mesins','users','hasil_pemeliharaans'))->with('data',$data);
    }
   
    public function cetakPDF($id){
        $data=Pemeliharaan::where('pemeliharaans.id_pemeliharaan',$id)->join('hasil_pemeliharaans', 'hasil_pemeliharaans.id_pemeliharaan','=','pemeliharaans.id_pemeliharaan')
        ->join('mesins', 'mesins.id_mesin','=','pemeliharaans.id_mesin')
        ->select('pemeliharaans.*','mesins.nama_mesin','hasil_pemeliharaans.metode','hasil_pemeliharaans.hasil','hasil_pemeliharaans.status')
        ->first();
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $hasil_pemeliharaans= Hasil_Pemeliharaan::with('pemeliharaan');
        $users=User::all();

         $pdf = PDF::loadView('admin.cetakdetailPemeliharaan',['data'=>$data,'mesins'=>$mesins]);
         $pdf->setPaper('A4','potrait');
         return $pdf->stream('Detail Pemeliharaan Mesin.pdf');
      

    }

    public function hasil($id)
    {
        $data=Pemeliharaan::find($id);
        $hasilpemeliharaan=Hasil_Pemeliharaan::all();
        $parameter=Parameter::all();
        $mesins=Mesin::all();
        $users=User::where('role','operator')->get();
        return view('operator/formHasilPemeliharaan',compact('data','hasilpemeliharaan','parameter','mesins','users'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_mesin' => ['required', 'string', 'max:255'],
            'nama_parameter' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'tanggal_jadwal' => ['required'],
            
       ]);

       $pemeliharaan = Pemeliharaan:: find($id);
       $pemeliharaan->id_mesin =$request->nama_mesin;
       $pemeliharaan->id_parameter =$request->nama_parameter;
       $pemeliharaan->id_user =$request->username;
       $pemeliharaan->tanggal_jadwal =$request->tanggal_jadwal;
       $pemeliharaan->save();

   
       return redirect('admin/jadwalPemeliharaan')->with('status','Data Berhasil Di Ubah');

   }

}
