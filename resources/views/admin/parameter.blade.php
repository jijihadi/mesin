@extends('layouts.appNavbar')
@section('title','Data Parameter Pemeliharaan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"> <strong>DATA PARAMETER PEMELIHARAAN MESIN PRODUKSI CV. SUMBER NIAGA</strong> </div>

                <div class="card-body">
                    <a href="{{ url('admin/tambahParameter') }}" class="btn btn-primary btn-sm mb-2 "> <i class="fas fa-plus"></i> Tambah Data</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('delete') }}
                        </div>
                    @endif

                    
                <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Parameter</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    @foreach($parameter as $point)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row ">{{$loop->iteration}}</th>
                        <td>{{$point->nama_parameter}}</td>
                        <td class="text-center">
  
                        

                        <a href="/admin/{{$point->id_parameter}}/ubahDataParameter" class="btn btn-success btn-sm mb-1 " title="Ubah Data Parameter Mesin"> <i class="fas fa-edit"></i></a>
                         
                        
                       
                        
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal Tambah Point -->
@foreach($parameter as $point)
    <div class="modal fade " id="bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mesin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <form class="form" method= "post" action="{{route('tambahParameter.tambah')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="parameter">Point Parameter</label>
                            <input type="text" class="form-control @error('parameter') is-invalid @enderror" id="parameter" name="parameter"  value="{{old('parameter')}}" placeholder="Parameter Pemeliharaan">
                                @error('parameter')
                                <div class="invalid-feedback">{{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                        </form>

        </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
