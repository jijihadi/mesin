<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_pemeliharaans', function (Blueprint $table) {
            $table->increments('id_hasil_pemeliharaan');
            $table->integer('id_pemeliharaan')->unsigned();
            $table->string('metode')->nullable();
            $table->string('hasil')->nullable();
            $table->enum('status', ['belum dicek','selesai']);
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
        Schema::dropIfExists('hasil_pemeliharaan');
    }
}
