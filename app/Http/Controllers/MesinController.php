<?php

namespace App\Http\Controllers;
use App\Mesin;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MesinController extends Controller
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
        $mesins = Mesin::paginate(15);
        return view('admin.mesin', compact('mesins'));
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $mesins = Mesin::where('nama_mesin','like',"%".$cari."%")
        ->orWhere('lokasi','like',"%".$cari."%")->paginate(15);
        return view('admin.mesin', compact('mesins'));
       
        
        
        
       
       
    }
    public function show(){
        
        return view('admin.tambahMesin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mesin' => ['required', 'string', 'max:255', 'unique:mesins'],
            // 'merk_mesin' => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'string', 'max:255'],
            'tanggal_pembelian' => ['required', 'string', 'max:255'],
            'tahun_pembuatan' => ['required', 'string', 'max:255'],
            'periode_pakai' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string', 'max:255'],
            
       ]);

       $dataMesin = new Mesin;
       $dataMesin->nama_mesin = $request->nama_mesin;
    //    $dataMesin->merk_mesin = $request->merk_mesin;
       $dataMesin->kapasitas =$request->kapasitas;
       $dataMesin->tanggal_pembelian =$request->tanggal_pembelian;
       $dataMesin->tahun_pembuatan =$request->tahun_pembuatan;
       $dataMesin->periode_pakai  =$request->periode_pakai;
       $dataMesin->lokasi  =$request->lokasi;
       $dataMesin->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
       return redirect('admin/mesin')->with('status','Data Berhasil Di Simpan');
    }

    // public function edit(Request $request, $id)
    // {
    //     if($request->isMethod('post')){
    //         $mesin=$request->all();

    //         Mesin::where(['id'=>$id])->update(['nama_mesin'=>$mesin['nama_mesin'],'merk_mesin'=>$mesin['merk_mesin'],'kapasitas'=>$mesin['kapasitas'],'tanggal_pembelian'=>$mesin['tanggal_pembelian'],'tahun_pembuatan'=>$mesin['tahun_pembuatan'],'periode_pakai'=>$mesin['periode_pakai'],'lokasi'=>$mesin['lokasi']]);
    //         return redirect('admin/mesin')->with('status','Data Berhasil Di Rubah');
    //     }
    // }
    public function delete($id)
    {
        $mesin=Mesin::where('id',$id)->delete();
        return redirect('admin/mesin')->with('delete','Data Berhasil Di Hapus');
        
    }

    public function ubah($id)
    {
        $mesin=Mesin::find($id);
        return view('admin/ubahDataMesin',compact('mesin'));
    }

   public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mesin' => ['required', 'string', 'max:255'],
            'kapasitas' => ['required', 'string', 'max:255'],
            'tanggal_pembelian' => ['required', 'string', 'max:255'],
            'tahun_pembuatan' => ['required', 'string', 'max:255'],
            'periode_pakai' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string', 'max:255'],
            
       ]);

       $dataMesin = Mesin::find($id);
       $dataMesin->nama_mesin = $request->nama_mesin;
       $dataMesin->kapasitas =$request->kapasitas;
       $dataMesin->tanggal_pembelian =$request->tanggal_pembelian;
       $dataMesin->tahun_pembuatan =$request->tahun_pembuatan;
       $dataMesin->periode_pakai  =$request->periode_pakai;
       $dataMesin->lokasi  =$request->lokasi;
       $dataMesin->save();
       return redirect('admin/mesin')->with('status','Data Berhasil Di Rubah');
    }

}
