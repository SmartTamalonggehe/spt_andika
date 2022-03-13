<?php

use App\Models\Gaji;
use App\Models\Surat;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    $nm = 'admin';
    $pegawai = Pegawai::orderBy('nama')->get();
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name("$nm.dashboard");

    Route::get('/pegawai', function () {
        return view('admin.pegawai.index');
    })->name("$nm.pegawai");

    Route::get('/gaji', function () use ($pegawai) {
        return view('admin.gaji.index', compact('pegawai'));
    })->name("$nm.gaji");

    Route::get('/tunjangan/{id}', function ($id) {
        $gaji = Gaji::with('pegawai')->find($id);
        return view('admin.tunjangan.index', compact('gaji'));
    })->name("$nm.tunjangan");

    Route::get('/potongan/{id}', function ($id) {
        $gaji = Gaji::with('pegawai')->find($id);
        return view('admin.potongan.index', compact('gaji'));
    })->name("$nm.potongan");

    Route::get('/surat/{jenis}', function ($jenis) use ($pegawai) {
        return view('admin.surat.index', compact('jenis', 'pegawai'));
    })->name("$nm.surat");

    Route::get('/pengikut/{id}', function ($id) use ($pegawai) {
        return view('admin.pengikut.index', compact('id', 'pegawai'));
    })->name("$nm.pengikut");

    Route::get('/kwitansi', function () {
        $surat = Surat::orderByDesc('tgl_surat')->where('jenis_surat', 'SPT')->get();
        return view('admin.kwitansi.index', compact('surat'));
    })->name("$nm.kwitansi");

    Route::get('/kwitansiDetail/{id}', function ($id) {
        return view('admin.kwitansiDetail.index', compact('id'));
    })->name("$nm.kwitansiDetail");
});
