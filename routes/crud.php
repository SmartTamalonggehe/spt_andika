<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUD\AkunController;
use App\Http\Controllers\CRUD\GajiController;
use App\Http\Controllers\CRUD\SuratController;
use App\Http\Controllers\CRUD\PegawaiController;
use App\Http\Controllers\CRUD\KwitansiController;
use App\Http\Controllers\CRUD\PengikutController;
use App\Http\Controllers\CRUD\PotonganController;
use App\Http\Controllers\CRUD\TunjanganController;
use App\Http\Controllers\CRUD\KwitansiDetailController;
use App\Http\Controllers\CRUD\BuktiPerjalananController;
use App\Http\Controllers\CRUD\UploadDokumenController;

Route::prefix('crud')->group(function () {
    Route::resources([
        'pegawai' => PegawaiController::class,
        'gaji' => GajiController::class,
        'tunjangan' => TunjanganController::class,
        'potongan' => PotonganController::class,
        'surat' => SuratController::class,
        'pengikut' => PengikutController::class,
        'kwitansi' => KwitansiController::class,
        'kwitansiDetail' => KwitansiDetailController::class,
        'akun' => AkunController::class,
        'bukti-perjalanan' => BuktiPerjalananController::class,
        'upload-dokumen' => UploadDokumenController::class,
    ]);
});
