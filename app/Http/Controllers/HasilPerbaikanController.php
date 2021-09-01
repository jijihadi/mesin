<?php

namespace App\Http\Controllers;

use App\Hasil_Perbaikan;
use App\Perbaikan;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HasilPerbaikanController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hasil_Perbaikan  $hasil_Perbaikan
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil_Perbaikan $hasil_Perbaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hasil_Perbaikan  $hasil_Perbaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil_Perbaikan $hasil_Perbaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hasil_Perbaikan  $hasil_Perbaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil_Perbaikan $hasil_Perbaikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hasil_Perbaikan  $hasil_Perbaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil_Perbaikan $hasil_Perbaikan)
    {
        //
    }

    public function hasilperbaikan(Request $request, $id)
    {
            $request->validate([
                'tanggal_perbaikan' => ['required'],
                'dilakukan_perbaikan' => ['required', 'max:255'],
                'hasil' => ['required', 'max:255'],
                'status' => ['required', 'max:255'],
                
          
           
      ]);

      $hasilperbaikan=$request->all();

        
    Hasil_Perbaikan::where(['id_perbaikan'=>$id])
    ->update(['status'=>$hasilperbaikan['status'],'dilakukan_perbaikan'=>$hasilperbaikan['dilakukan_perbaikan'],
    'hasil'=>$hasilperbaikan['hasil'],'tanggal_perbaikan'=>$hasilperbaikan['tanggal_perbaikan'],'downtime'=>$data2] );

       return redirect('teknisi/jadwalPerbaikan')->with('status','Data Berhasil Di Simpan');
    }
}
