<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\GajiAPI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SuratAPI;
use App\Http\Controllers\API\PegawaiAPI;
use App\Http\Controllers\API\KwitansiAPI;
use App\Http\Controllers\API\PengikutAPI;
use App\Http\Controllers\API\PotonganAPI;
use App\Http\Controllers\API\TunjanganAPI;
use App\Http\Controllers\API\KwitansiDetAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('gaji', [GajiAPI::class, 'index'])->name('gaji.index');
Route::get('kwitansi', [KwitansiAPI::class, 'index'])->name('kwitansi.index');
Route::get('kwitansi-det', [KwitansiDetAPI::class, 'index'])->name('kwitansi-det.index');
Route::get('pegawai', [PegawaiAPI::class, 'index'])->name('pegawai.index');
Route::get('pengikut', [PengikutAPI::class, 'index'])->name('pengikut.index');
Route::get('potongan', [PotonganAPI::class, 'index'])->name('potongan.index');
Route::get('surat', [SuratAPI::class, 'index'])->name('surat.index');
Route::get('tunjangan', [TunjanganAPI::class, 'index'])->name('tunjangan.index');
