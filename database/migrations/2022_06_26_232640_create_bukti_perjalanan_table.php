<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuktiPerjalananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukti_perjalanan', function (Blueprint $table) {
            $table->id();
            // foreign key surat_id
            $table->foreignId('surat_id')->constrained('surat')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_file');
            $table->string('path_file');
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
        Schema::dropIfExists('bukti_perjalanan');
    }
}
