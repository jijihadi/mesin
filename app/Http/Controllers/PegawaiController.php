<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        $pegawais = Pegawai::with('jabatan')->paginate(15);
        return view('admin.pegawai', compact('pegawais','jabatans'));
        // return view('admin.pegawai');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        // $jabatans = Jabatan::all();
        $pegawais = Pegawai::with('jabatan')
        ->where('nama','like',"%".$cari."%")
        ->orWhere('status_pegawai','like',"%".$cari."%")
        ->paginate(15);
        
        return view('admin.pegawai', compact('pegawais'));
        // return view('admin.pegawai');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatans = Jabatan::all();
        
        return view('admin.tambahPegawai',compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:150'],
            'alamat' => ['required', 'string', 'max:150'],
            'no_telp' => ['required', 'string', 'max:13'],
            'nama_jabatan' => ['required', 'string'],
            'status_pegawai' => ['required', 'string'],
       ]);

       $id = IdGenerator::generate(['table' => 'pegawais','field'=> 'id_pegawai', 'length' => 6, 'prefix' =>  date('y')]);
    

       $pegawai = new Pegawai;
       $pegawai->id_pegawai= $id;
       $pegawai->nama= $request->nama;
       $pegawai->alamat = $request->alamat;
       $pegawai->no_telp= $request->no_telp;
       $pegawai->id_jabatan =$request->nama_jabatan;
       $pegawai->status_pegawai =$request->status_pegawai;
       $pegawai->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
       return redirect('admin/pegawai')->with('status','Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }

    public function ubah($id)
    {
        $pegawai=Pegawai::find($id);
        $jabatans=Jabatan::all();
        return view('admin/ubahDataPegawai',compact('pegawai','jabatans'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => ['required', 'max:150'],
            'alamat' => ['required', 'max:150'],
            'no_telp' => ['required', 'max:13'],
            'nama_jabatan' => ['required' ],
            'status_pegawai' => ['required'],
       ]);


       $pegawais = Pegawai::find($id);
       $pegawais->nama= $request->nama;
       $pegawais->alamat = $request->alamat;
       $pegawais->no_telp= $request->no_telp;
       $pegawais->id_jabatan =$request->nama_jabatan;
       $pegawais->status_pegawai =$request->status_pegawai;
       $pegawais->save();
       
       return redirect('admin/pegawai')->with('status','Data Berhasil Di Ubah');

   }
}
