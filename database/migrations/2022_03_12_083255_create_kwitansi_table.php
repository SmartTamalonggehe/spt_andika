<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwitansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwitansi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')
                ->constrained('surat')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('kode_rek', 20);
            $table->date('tgl_kwitansi');
            $table->string('terima', 50);
            $table->integer('banyak');
            $table->string('terbilang', 50);
            $table->integer('pergi');
            $table->integer('pulang');
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
        Schema::dropIfExists('kwitansi');
    }
}
