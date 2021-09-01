@extends('layouts.appNavbar')
@section('title','Laporan Perbaikan Mesin')
@section('content')
<div class="container">
<form  method="post" action="/teknisi/laporanPerbaikan">
    <div class="row">

    <div class="col-md-12 mb-3">
    @csrf
            <div class="input-group mr-3">
                <label for="tglawal">Tanggal Awal</label>
                <input type="date" name="tglawal" id="tglawal" class="form-control  mr-3 ml-3"  />
                
                <label for="tglakhir">Tanggal Akhir</label>
                <input type="date" name="tglakhir" id="tglakhir" class="form-control mr-3 ml-3" />
                
                <button type="submit" class="btn btn-primary" style="color:white;" name="cari"/>Lihat Data</button>
                    <a  onClick="this.href='/teknisi/laporanPerbaikanPDF/'+ document.getElementById('tglawal').value + 
                    '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-info ml-3 " style="color:white;"><i class='far fa-file-pdf'> </i> Download PDF</a>
            </div>
                   
        </div>
        </form>

        <div class="col-md-12">
            <div class="card mt-4">
                <!-- <div class="card-header">Rekap Data Perbaikan Mesin</div> -->

                <div class="card-body">
                <h4 class="text-center"> <strong>REKAPITULASI DATA PERBAIKAN MESIN PRODUKSI CV. SUMBER NIAGA</strong> </h4>
                    <!-- <p class="text-center"> <strong>Range Tanggal 01/01/2021 - 02/02/2021</strong> </p> -->
                    <br>
                    
                    <div class="table-responsive">
                    <table class="table table-bordered  ">
                    <thead class="bg-info text-center">
                        <tr>
                        <th scope="col">No</th>
                        <!-- <th scope="col">Tanggal</th> -->
                        <th scope="col">Nama Mesin</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Deskripsi Masalah</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Tanggal Perbaikan</th>
                        <th scope="col">Dilakukan Perbaikan</th>
                        <th scope="col">Hasil Perbaikan</th>
                        <th scope="col">Downtime (Mesin Mati)</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>

                    
                    @foreach($perbaikans as $hasil)
                    <tbody>
                        <tr>
                        <th class="text-center" scope="row">{{$loop->iteration}}</th>
                        <td>{{$hasil->mesin->nama_mesin}}</td>
                        <td>{{$hasil->mesin->lokasi}}</td>
                        <td>{{$hasil->deskripsi_masalah}}</td>
                        <td>{{$hasil->created_at}}</td>
                        <td>{{$hasil->tanggal_perbaikan}}</td>
                        <td>{{$hasil->dilakukan_perbaikan}}</td>
                        <td>{{$hasil->hasil}}</td>
                        <td>{{$hasil->created_at->diffInHours($hasil->tanggal_perbaikan)}} Jam</td>
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
</div>
@endsection
