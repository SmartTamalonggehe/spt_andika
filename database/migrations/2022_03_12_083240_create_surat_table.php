<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')
                ->constrained('pegawai')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('tgl_surat');
            $table->string('no_surat', 20);
            $table->string('jenis_surat', 4);
            $table->string('dasar', 200);
            $table->string('dari', 50);
            $table->string('tujuan', 50);
            $table->text('maksud');
            $table->string('alat_angkut', 100);
            $table->integer('lama');
            $table->string('tgl_berangkat', 50);
            $table->string('tgl_kembali', 50);
            $table->string('beban_anggaran', 100);
            $table->string('mata_anggaran', 50);
            $table->string('keterangan', 200)->nullable();
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
        Schema::dropIfExists('surat');
    }
}
