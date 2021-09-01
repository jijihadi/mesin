<?php

namespace App\Http\Controllers;
use App\Parameter;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ParameterController extends Controller
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
        $parameter = Parameter::paginate(15);
        return view('admin.parameter', compact('parameter'));
    }

    public function show(){
        
        return view('admin.tambahParameter');
    }

     // use within single line code
     
     public function store(Request $request)
     {
         $request->validate([
             'nama_parameter' => ['required', 'string', 'max:255'],
             
             ]);
        $id = IdGenerator::generate(['table' => 'parameters','field'=> 'id_parameter', 'length' => 6, 'prefix' => date('y')]);

       $datacek = new Parameter;
       $datacek->id_parameter = $id;
       $datacek->nama_parameter = $request->nama_parameter;
       $datacek->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
       return redirect('admin/parameter')->with('status','Data Berhasil Di Simpan');
    }

    // public function delete($id)
    // {
    //     $points=Parameter::where('id',$id)->delete();
    //     return redirect('admin/parameter')->with('delete','Data Berhasil Di Hapus');
        
    // }


    public function ubah($id)
    {
        $point = Parameter::find($id);
        return view('admin/ubahDataParameter',compact('point'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_parameter' => ['required', 'string', 'max:255'],
            
            ]);
     
      $datacek = Parameter::find($id);
      $datacek->nama_parameter = $request->nama_parameter;
      $datacek->save();
      return redirect('admin/parameter')->with('status','Data Berhasil Di Ubah');
   }
}
