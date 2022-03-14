<?php

use App\Http\Controllers\Cetak\PDFController;
use Illuminate\Support\Facades\Route;

Route::prefix('cetak')->group(function () {
    Route::get('/gaji/{id}', [PDFController::class, 'gaji'])->name('cetak.gaji');
    Route::get('/surat_spt/{id}', [PDFController::class, 'surat_spt'])->name('cetak.surat_spt');
    Route::get('/surat_sppd/{id}', [PDFController::class, 'surat_sppd'])->name('cetak.surat_sppd');
    Route::get('/kwitansi/{id}', [PDFController::class, 'kwitansi'])->name('cetak.kwitansi');
});
