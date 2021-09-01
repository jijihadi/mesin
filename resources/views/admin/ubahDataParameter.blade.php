@extends('layouts.appNavbar')
@section('title','Mengubah Data Parameter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">Form Tambah Data Parameter Pemeliharaan Mesin</div> -->

                <div class="card-body">
                <h4 class="text-center "><strong>FORM UNTUK MENGUBAH DATA PARAMETER PEMELIHARAAN MESIN PRODUKSI <br> CV. SUMBER NIAGA </strong></h4> 
                    <br>
                    <br>

                    <form class="form" method= "POST" action="/admin/{{$point->id_parameter}}/ubahDataParameter/update"  enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label for="nama_parameter">Parameter</label>
                            <input type="text" class="form-control @error('nama_parameter') is-invalid @enderror" id="nama_parameter" name="nama_parameter" placeholder="Parameter" value="{{ $point->nama_parameter}}">
                                @error('nama_parameter')
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
