@extends('layouts.appNavbar')
@section('title','Laporan Pemeliharaan Mesin')
@section('content')
<div class="container">
    <form  method="post" action="/teknisi/laporanPemeliharaan">
    <div class="row ">
        <div class="col-md-12 mb-3">
            @csrf
            <div class="input-group row ">
                <label for="tglawal">Tanggal Awal</label>
                
                <input type="date" name="tglawal" id="tglawal" class="form-control  mr-3 ml-3" />
                
              

                <label for="tglakhir">Tanggal Akhir</label>
           
                <input type="date" name="tglakhir" id="tglakhir" class="form-control mr-3 ml-3" />
                
                
                    <button type="submit" class="btn btn-primary" style="color:white;" name="cari"/>Lihat Data</button>
                    <a  onClick="this.href='/teknisi/laporanPemeliharaanPDF/'+ document.getElementById('tglawal').value + 
                    '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-info ml-3 " style="color:white;"><i class='far fa-file-pdf'> </i> Download PDF</a>

            </div>
                   
        </div>
                    </form>

        <div class="col-md-12">
            <div class="card mt-4">
                <!-- <div class="card-header">Rekap Data Pemeliharaan Mesin</div> -->

                <div class="card-body">

                    <h4 class="text-center"> <strong>REKAPITULASI DATA PEMELIHARAAN MESIN PRODUKSI CV. SUMBER NIAGA</strong> </h4>
                    <!-- <p class="text-center"> <strong>Range Tanggal </strong> </p> -->
                    <br>
                   
                    <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <!-- <th scope="col">Tanggal</th> -->
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Parameter</th>
                        <th scope="col">Tanggal Jadwal</th>
                        <th scope="col">Metode</th>
                        <th scope="col">Hasil Pemeriksaan</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>

                    @foreach($pemeliharaans as $hasil)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                        <td>{{$hasil->mesin->nama_mesin}}</td>
                        <td>{{$hasil->mesin->lokasi}}</td>
                        <td>{{$hasil->parameter->nama_parameter}}</td>
                        <td>{{$hasil->tanggal_jadwal}}</td>
                        <td>{{$hasil->metode}}</td>
                        <td>{{$hasil->hasil}}</td>
                        <td>{{$hasil->status}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                    
                    </table>
                    
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
