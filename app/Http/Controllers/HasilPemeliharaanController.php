<?php

namespace App\Http\Controllers;

use App\Hasil_Pemeliharaan;
use App\Pemeliharaan;
use App\Parameter;
use App\Mesin;
use App\User;
use Illuminate\Http\Request;

class HasilPemeliharaanController extends Controller
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
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Hasil_Pemeliharaan  $hasil_Pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil_Pemeliharaan $hasil_Pemeliharaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hasil_Pemeliharaan  $hasil_Pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil_Pemeliharaan $hasil_Pemeliharaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hasil_Pemeliharaan  $hasil_Pemeliharaan
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hasil_Pemeliharaan  $hasil_Pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil_Pemeliharaan $hasil_Pemeliharaan)
    {
        //
    }

    // public function hasil($id)
    // {
    //     $data=Pemeliharaan::find($id);
    //     $hasil=Hasil_Pemeliharaan::all();
    //     $parameter=Parameter::all();
    //     $mesins=Mesin::all();
    //     $users=User::where('role','operator')->get();
    //     return view('operator/formHasilPemeliharaan',compact('data','hasil','parameter','mesins','users'));
    // }

    // public function hasil($id)
    // {
    //     $hasil=Hasil_Pemeliharaan::with('pemeliharaan')->find($id);
    //     $parameter=Parameter::all();
    //     $mesins=Mesin::all();
    //     $data=Pemeliharaan::with('mesin','parameter','user');
    //     $users=User::where('role','operator')->get();
    //     return view('operator/formHasilPemeliharaan',compact('data','hasil','parameter','mesins','users'));
    // }

    // public function status(Request $request, $id)
    // {
    //     $request->validate([
    //         'metode' => ['required', 'string', 'max:255'],
    //         'hasil' => ['required', 'max:255'],
    //         'status' => ['required'],
            
    //    ]);


    //     if($request->isMethod('post')){
    //         $pemeliharaans=$request->all();

    //         Pemeliharaan::where(['id'=>$id])->update(['status'=>$pemeliharaans['status'],'metode'=>$pemeliharaans['metode'],'hasil'=>$pemeliharaans['hasil']] );
    //         return redirect('admin/jadwalPemeliharaan');
    //     }
    //     // $pemeliharaans=$request->all();
    //     // Pemeliharaan::where(['id'=>$id])->update(['status'=>$pemeliharaans['status']]);
    //     // // $pemeliharaan=Pemeliharaan::where('id',$id)->delete();
    //     // return redirect('admin/jadwalPemeliharaan');
        
    // }


    public function update(Request $request, $id)
    {
            $request->validate([
                'metode' => ['required', 'string', 'max:255'],
                'hasil' => ['required', 'max:255'],
                'status' => ['required', 'max:255'],
          
           
      ]);

      $hasilpemeliharaan=$request->all();

    Hasil_Pemeliharaan::where(['id_pemeliharaan'=>$id])->update(['status'=>$hasilpemeliharaan['status'],'metode'=>$hasilpemeliharaan['metode'],'hasil'=>$hasilpemeliharaan['hasil']] );

    //    $data = \App\Pemeliharaan::find($id);
    //    $data = \App\Pemeliharaan::find($id);
    //    $data->metode =$request->metode;
    //    $data->hasil =$request->hasil;
    //    $data->status =$request->status;
    //    $data->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
       return redirect('operator/jadwalPemeliharaan')->with('status','Data Berhasil Di Simpan');
    }

}
