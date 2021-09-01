<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_perbaikans', function (Blueprint $table) {
            $table->increments('id_hasil_perbaikan');
            $table->integer('id_perbaikan')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->datetime('tanggal_perbaikan')->nullable();
            // $table->date('downtime',100);
            $table->string('dilakukan_perbaikan')->nullable();
            $table->string('hasil')->nullable();
            $table->enum('status', ['belum diperbaiki', 'sedang diperbaiki','selesai']);
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
        Schema::dropIfExists('hasil_perbaikans');
    }
}
