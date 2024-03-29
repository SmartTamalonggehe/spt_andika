<?php

namespace App\Http\Controllers\Cetak;

use App\Models\Gaji;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kwitansi;
use App\Models\Pengikut;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{
    public function gaji($id)
    {
        $gaji = Gaji::with('potongan', 'tunjangan', 'pegawai')->find($id);
        // return view('admin.gaji.cetak', compact('gaji'));
        $pdf = PDF::loadView('admin.gaji.cetak', compact('gaji'));
        return $pdf->download("Laporan Gaji {$gaji->tgl_gaji}.pdf");
    }
    public function surat_spt($id)
    {
        $surat = Surat::with('pegawai', 'pengikut')->find($id);
        $pengikut = Pengikut::where('surat_id', $id)->with('pegawai')->get();
        // return view('admin.surat.cetak_spt', compact('surat', 'pengikut'));
        $pdf = PDF::loadView('admin.surat.cetak_spt', compact('surat', 'pengikut'));
        return $pdf->download("Surat {$surat->jenis_surat} {$surat->tgl_surat}.pdf");
    }
    public function surat_sppd($id)
    {
        $surat = Surat::with('pegawai', 'pengikut')->find($id);
        $pengikut = Pengikut::where('surat_id', $id)->with('pegawai')->get();
        // return view('admin.surat.cetak_sppd', compact('surat', 'pengikut'));
        $pdf = PDF::loadView('admin.surat.cetak_sppd', compact('surat', 'pengikut'));
        return $pdf->download("Surat {$surat->jenis_surat} {$surat->tgl_surat}.pdf");
    }
    public function kwitansi($id)
    {
        $kwitansi = Kwitansi::with('kwitansiDetail', 'surat')->find($id);
        $surat = Surat::with('pegawai')->find($kwitansi->surat_id);
        // return view('admin.kwitansi.cetak', compact('kwitansi', 'surat'));s
        $pdf = PDF::loadView('admin.kwitansi.cetak', compact('kwitansi', 'surat'));
        return $pdf->download("Kwitansi {$kwitansi->tgl_kwitansi}.pdf");
    }
}
