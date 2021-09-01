<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notifikasi Perbaikan Mesin CV. SUMBER NIAGA</title>

</head>
<body>
<div class="container">
        <div class="col-md-12">

        <h1>PERBAIKAN MESIN CV. SUMBER NIAGA</h1>
        <p>Nama Mesin : {{$perbaikan->mesin->nama_mesin}}</p>
        <p>Deskripsi Masalah : {{$perbaikan->deskripsi_masalah}}</p>
        <p>Tanggal Pengajuan : {{$perbaikan->created_at}}</p>
        <p>Diajukan Oleh : {{$perbaikan->user->username}}</p>

    </div>
</div>

</body>
</html>