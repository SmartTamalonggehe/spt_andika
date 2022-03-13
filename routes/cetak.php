<?php

use App\Http\Controllers\Cetak\PDFController;
use Illuminate\Support\Facades\Route;

Route::prefix('cetak')->group(function () {
    Route::get('/gaji/{id}', [PDFController::class, 'gaji'])->name('cetak.gaji');
});
