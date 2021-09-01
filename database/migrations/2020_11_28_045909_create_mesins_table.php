<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesins', function (Blueprint $table) {
            $table->increments('id_mesin');
            $table->string('nama_mesin',150);
            $table->string('kapasitas',60);
            $table->date('tanggal_pembelian');
            $table->string('tahun_pembuatan',20);
            $table->string('periode_pakai',20);
            $table->string('lokasi',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesins');
    }
}
