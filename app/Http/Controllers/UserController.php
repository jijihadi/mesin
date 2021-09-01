<?php

namespace App\Http\Controllers;
use App\User;
use App\Pegawai;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $pegawai=Pegawai::all();
        $users = User::with('pegawai')->paginate(15);
        return view('admin.user', compact('users','pegawai'));
    }
    // public function pegawai()
    // {
    //     // $users = User::paginate(15);
    //     return view('admin.pegawai');
    // }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $pegawai=Pegawai::all();
        $users = User::with('pegawai')->where('username','like',"%".$cari."%")->paginate(15);
        return view('admin.user', compact('users','pegawai'));
        
        
        
       
       
    }
    
    public function show(){
        
        return view('admin.tambahUser');
    }
    // public function tambahPegawai(){
        
    //     return view('admin.tambahPegawai');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required', 'string', 'max:20'],
       ]);

       $userData = new User;
       $userData->id_pegawai = $request->id_pegawai;
       $userData->email = $request->email;
       $userData->username = $request->username;
       $userData->password = bcrypt($request->password);
       $userData->role =$request->level;
       $userData->save();

    //    $user = User::create($userData);
    //    alert()->success('Data Berhasil Ditambahkan', 'Success');
       return redirect('admin/user')->with('status','Data Berhasil Di Simpan');
    }

    public function edit(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $user=$request->all();

            User::where(['id'=>$id])->update(['name'=>$user['nama'],'email'=>$user['email'],'role'=>$user['level']]);
            return redirect('admin/user')->with('status','Data Berhasil Di Rubah');
        }
    }

    public function delete($id)
    {
        $user=User::where('id',$id)->delete();
        return redirect('admin/user')->with('delete','Data Berhasil Di Hapus');
        
    }

    public function ubah($id)
    {
        $user=User::find($id);
        $pegawai=Pegawai::all();
        return view('admin/ubahDataUser',compact('pegawai','user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pegawai' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required', 'string', 'max:20'],
       ]);

       $userData = User::find($id);
       $userData->id_pegawai = $request->id_pegawai;
       $userData->email = $request->email;
       $userData->username = $request->username;
       $userData->password = bcrypt($request->password);
       $userData->role =$request->level;
       $userData->save();

 
       return redirect('admin/user')->with('status','Data Berhasil Di Ubah');

   }
}
