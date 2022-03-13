<?php

namespace App\Http\Controllers\Cetak;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gaji;

class PDFController extends Controller
{
    public function gaji($id)
    {
        $gaji = Gaji::with('potongan', 'tunjangan', 'pegawai')->find($id);
        // return view('admin.gaji.cetak', compact('gaji'));
        $pdf = PDF::loadView('admin.gaji.cetak', compact('gaji'));
        return $pdf->stream("Laporan Gaji {$gaji->tgl_gaji}.pdf");
    }
}
