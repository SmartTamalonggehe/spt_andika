@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi</title>

    <style>
        .page-break {
            page-break-after: always;
        }

        /* reset */
        body {
            margin: 0 10px;
            padding: 0;
            box-sizing: border-box;
            font-size: 12px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0;
            padding: 0;
        }

        ol,
        ul {
            margin: 0;
            padding-left: 20px
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-underline {
            text-decoration: underline;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .mt-1 {
            margin-top: 0.3em;
        }

        .mt-2 {
            margin-top: 0.5em;
        }

        .mt-3 {
            margin-top: 1em;
        }

        .mt-4 {
            margin-top: 1.5em;
        }

        hr {
            margin: 0;
        }

        hr.garis_surat {
            border: 1px solid #000;
            height: 1px;
            background-color: #000;
            margin-bottom: 2px
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        th {
            padding: 3px 0;
            vertical-align: top;
        }

        .table-bordered td,
        th {
            border: 1px solid #000;
            padding: 3px 5px;
        }

        .isi-gaji {
            width: auto;
            margin: auto
        }

        .clearfix {
            clear: both;
        }

        .float-left {
            float: left;
        }

        .float-right {
            float: right;
        }

        .d-inline {
            display: inline;
        }

        .d-inline-block {
            display: inline-block;
        }

        .img {
            width: 50px;
            height: auto;
        }

        .hal-kwitansi {
            margin-left: 400px;
        }

    </style>
</head>

<body>
    <div class="kopsurat">
        <img src="{{ public_path('assets/images/logo/papua-2.webp') }}" class="float-left img" alt="" srcset="">
        <div class="text-center">
            <h3>PEMERINTAH PROVINSI PAPUA</h3>
            <h2 class="mt-2">DINAS OLAHRAGA DAN PEMUDA</h2>
            <h4>Kotaraja Komplex Dinas Otonom Dedung A Lantai II</h4>
            <h4>Jalan Raya Abepura-Kotaraja Telp. (0967) 582269 Jayapura</h4>
        </div>
        <hr class="garis_surat mt-1">
        <hr>
    </div>
    <div class="hal-kwitansi">
        <table>
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Kode Rekening</td>
                <td>:</td>
                <td>{{ $kwitansi->kode_rek }}</td>
            </tr>
        </table>
    </div>
    <h1 class="text-underline text-center" style="margin: 30px 0">K W I T A N S I</h1>
    <table class="table">
        <tr>
            <td width="130px">Sudah terima dari</td>
            <td width="10px">:</td>
            <td>{{ $kwitansi->terima }}</td>
        </tr>
        <tr>
            <td>Banyaknya uang</td>
            <td>:</td>
            <td><span class="text-capitalize">{{ terbilang($kwitansi->jumlah_ditetapkan) }} rupiah</span></td>
        </tr>
        <tr>
            <td>Untuk pembayaran</td>
            <td>:</td>
            <td>
                Biaya Perjalanan Dinas {{ $surat->dari }} - {{ $surat->tujuan }} (PP) Dalam Rangka
                {{ $surat->maksud }} An. <b>{{ $surat->pegawai->nama }} Gol. {{ $surat->pegawai->golongan }},</b>
                selama {{ $surat->lama }} hari sesuai SPT No. {{ $surat->no_surat }}, tanggal
                {{ Carbon::createFromFormat('Y-m-d', $surat->tgl_surat)->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td>Rp.
                {{ number_format($kwitansi->jumlah_ditetapkan, 0, '.', ',') }}</td>
        </tr>
    </table>

    <div class="ttd" style="margin-top: 40px;">
        <p class="text-right">Jayapura
            {{ Carbon::createFromFormat('Y-m-d', $surat->tgl_surat)->format('d M Y') }}
        </p>
        <div class="float-left">
            <div class="text-center">
                <p>Pejabat Pelaksana Teknis Kegiatan</p>
                <p>(PPTK)</p>
                <br>
                <br>
                <br>
                <p><b>ALOYSIUS G. MAURITS, A.Ma, Hut,ST,M.Si</b></p>
                <p><b>NIP. 19740320 199610 1 001</b></p>
            </div>
        </div>
        <div class="float-right">
            <div class="text-center">
                <br>
                <p>Yang Menerima</p>
                <br>
                <br>
                <br>
                <p><b>{{ $surat->pegawai->nama }}</b></p>
                <p><b>{{ $surat->pegawai->NIP }}</b></p>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr class="mt-2">
    </div>
    <div class="ttd mt-4">
        <div class="float-right">
            <table>
                <tr>
                    <td>Lunas dibayar</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Pada tanggal</td>
                    <td>:</td>
                    <td>{{ Carbon::createFromFormat('Y-m-d', $kwitansi->tgl_terima)->format('d M Y') }}</td>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>
        <div class="float-left">
            <div class="text-center">
                <p>Mengetahui/Menyetujui:</p>
                <p>Plt. Kepala Dinas Olahraga dan Pemuda</p>
                <p>Provinsi Papua</p>
                <br>
                <br>
                <br>
                <p><b>ALEXANDER K.Y. KAPISA, ST.</b></p>
                <p><b>NIP. 19781126 200502 1 002</b></p>
            </div>
        </div>
        <div class="float-right">
            <div class="text-center">
                <br>
                <p>Bendahara Pengeluaran</p>
                <br>
                <br>
                <br>
                <br>
                <p><b>FEBRIAN R.N NATAN, A.Md.</b></p>
                <p><b>NIP. 19860201 2010004 2 003</b></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="page-break"></div>
    @include('admin.kwitansi.rincian')
</body>

</html>
