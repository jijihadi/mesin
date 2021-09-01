@extends('layouts.appNavbar')
@section('title','Form Untuk Mengubah Data Jabatan Pegawai')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Form Tambah Data Jabatan Pegawai</div> -->

                <div class="card-body">
                <h4 class="text-center "><strong> FORM UNTUK MENGUBAH DATA JABATAN PEGAWAI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>
                    <form class="form" method= "post" action="/admin/{{$jabatan->id_jabatan}}/ubahJabatan/update"   enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label for="nama_jabatan">Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" placeholder="Jabatan" value="{{ $jabatan->nama_jabatan}}">
                                @error('nama_jabatan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                       
                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Simpan Data</strong> </button>
                        </div>
                        
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
