@extends('layouts.appNavbar')
@section('title','Detail Perbaikan Mesin')
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
                    <h4 class="text-center "><strong>DETAIL PERBAIKAN MESIN PRODUKSI <br> CV. SUMBER NIAGA</strong></h4> 
                    <br>
                    <br>

                    <div class="table-responsive">
                    <table class="table table-bordered">
                    
                        
                       

                    <tbody>
                        <tr>
                        <th scope="col">Diajukan Oleh</th>
                        <td >{{$data->user->username}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Diperbaiki Oleh</th>
                        <td >{{$data->user->username}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Nama Mesin</th>
                        <td>{{$data->mesin->nama_mesin}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Lokasi</th>
                        <td>{{$data->mesin->lokasi}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Deskripsi Masalah</th>
                        <td>{{$data->deskripsi_masalah}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Tanggal Pengajuan</th>
                        <td>{{$data->created_at}}</td>
                        </tr>
                        
                        <tr>
                        <th scope="col">Tanggal Perbaikan</th>
                        <td>{{$data->tanggal_perbaikan}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Downtime (Mesin Mati)</th>
                        <td> {{$data->created_at->diffInHours($data->tanggal_perbaikan)}} Jam</td>
                        </tr>

                        <tr>
                        <th scope="col">Perbaikan yang Dilakukan</th>
                        <td>{{$data->dilakukan_perbaikan}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Hasil Perbaikan</th>
                        <td>{{$data->hasil}}</td>
                        </tr>

                        <tr>
                        <th scope="col">Status</th>
                        <td >{{$data->status}}</td>
                        </tr>
                        
                        <!-- <td >{{$data->created_at->isoFormat('D/M/Y')}}</td> -->
                        <!-- <td >{{$data->mesin->nama_mesin}}</td> -->
                        
                       
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
                <a style="color:white;" href="/teknisi/{{$data->id_perbaikan}}/cetakdetailPerbaikan" target="_blank" class=" btn btn-md btn-info mt-2 "><i class='far fa-file-pdf'> </i> Download PDF<span></span></a>
        </div>
    </div>
</div>


@endsection
