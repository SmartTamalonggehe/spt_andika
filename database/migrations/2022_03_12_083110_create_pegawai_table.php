<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('NIP', 20);
            $table->string('nama', 50);
            $table->string('bidang', 100);
            $table->string('bagian', 100);
            $table->string('pangkat', 50);
            $table->string('golongan', 10);
            $table->string('jabatan', 50);
            $table->string('instansi', 50);
            $table->string('tingkat', 50);
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
        Schema::dropIfExists('pegawai');
    }
}
