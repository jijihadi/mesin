@extends('layouts.appNavbar')
@section('title','Tambah User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Form Tambah Data Jabatan Pegawai</div> -->

                <div class="card-body">
                <h4 class="text-center "><strong> FORM TAMBAH DATA JABATAN PEGAWAI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>
                    <form class="form" method= "post" action="{{route('tambahJabatan.store')}}"   enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label for="nama_jabatan">Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" placeholder="Jabatan" value="{{ old('nama_jabatan') }}">
                                @error('nama_jabatan')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                       
                        <div class="tombol col">
                        <button class="btn btn-primary" type="submit" name="submit"> <strong>Tambah Data</strong> </button>
                        </div>
                        
                    </form>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
