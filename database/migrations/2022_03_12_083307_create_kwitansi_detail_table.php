<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwitansiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwitansi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kwitansi_id')
                ->constrained('kwitansi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('uraian', 100);
            $table->integer('lama');
            $table->integer('jumlah');
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
        Schema::dropIfExists('kwitansi_detail');
    }
}
