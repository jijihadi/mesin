@extends('layouts.appNavbar')
@section('title','Detail Pemeliharaan Mesin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <!-- <div class="card-header">Form Jadwal Pemeliharaan Mesin</div> -->
                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <h4 class="text-center "><strong>DETAIL PEMELIHARAAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>

                    <div class="table-responsive">
                    <table class="table table-bordered">
                    
                    <tbody>
                        <tr>
                        <th scope="col">Nama Mesin</th>
                        <td>{{$data->mesin->nama_mesin}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Lokasi</th>
                        <td>{{$data->mesin->lokasi}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Parameter</th>
                        <td>{{$data->parameter->nama_parameter}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Tanggal Jadwal</th>
                        <td>{{$data->tanggal_jadwal}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Metode</th>
                        <td>{{$data->metode}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Hasil Pemeriksaan</th>
                        <td>{{$data->hasil}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Status</th>
                        <td >{{$data->status}} </td>
                        </tr>
                        
                        <tr>
                        <th scope="col">Diperiksa Oleh</th>
                        <td >{{$data->user->username}} </td>
                        </tr>
                        <!-- <td >{{$data->created_at->isoFormat('D/M/Y')}}</td> -->
                        <!-- <td >{{$data->mesin->nama_mesin}}</td> -->
                        
                       
                    </tbody>
                   
                    </table>
                </div>
                </div>
            </div>
                <a style="color:white;" href="/teknisi/{{$data->id_pemeliharaan}}/cetakdetailPemeliharaan" target="_blank"  class=" btn btn-md btn-info mt-2 "><i class='far fa-file-pdf'> </i> Download PDF<span></span></a>
        </div>
    </div>
</div>
@endsection
