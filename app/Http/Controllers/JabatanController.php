<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function jabatan()
    {
        $jabatans = Jabatan::paginate(15);
        return view('admin.jabatan', compact('jabatans'));
    }
    public function tambahjabatan()
    {
        // $users = User::paginate(15);
        return view('admin.tambahJabatan');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_jabatan' => ['required', 'string', 'max:150'],
            
       ]);

       $jabatan = new Jabatan;
       $jabatan->nama_jabatan = $request->nama_jabatan;
       $jabatan->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
       return redirect('admin/jabatan')->with('status','Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }

    public function ubah($id)
    {
        $jabatan=Jabatan::find($id);
        return view('admin/ubahJabatan',compact('jabatan'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => ['required', 'string', 'max:150'],
            
       ]);

       $jabatan =Jabatan::find($id);
       $jabatan->nama_jabatan = $request->nama_jabatan;
       $jabatan->save();

  
       return redirect('admin/jabatan')->with('status','Data Berhasil Di Ubah');
    }
   

}
