<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notifikasi Jadwal Pemeliharaan Mesin CV. SUMBER NIAGA</title>

</head>
<body>
<div class="container">
        <div class="col-md-12">

        <h1>JADWAL PEMELIHARAAN MESIN CV. SUMBER NIAGA</h1>
        <p>Nama Mesin : {{$pemeliharaan->mesin->nama_mesin}}</p>
        <p>Parameter : {{$pemeliharaan->parameter->nama_parameter}}</p>
        <p>Tanggal Jadwal : {{$pemeliharaan->tanggal_jadwal}}</p>
        

    </div>
</div>

</body>
</html>