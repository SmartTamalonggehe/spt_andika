@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat SPPD</title>

    <style>
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
            padding: 5px 3px;
            border-color: #000;
            border-style: solid;
            border-width: 1px;
            vertical-align: top;
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

        tr p {
            padding: 5px 0px;
        }

    </style>
</head>

<body>
    <img src="{{ public_path('assets/images/logo/papua-2.webp') }}" class="float-left img" alt="" srcset="">
    <div class="text-center">
        <h3>PEMERINTAH PROVINSI PAPUA</h3>
        <h2 class="mt-1">DINAS OLAHRAGA DAN PEMUDA</h2>
        <h4>Kotaraja Komplex Dinas Otonom Dedung A Lantai II</h4>
        <h4>Jalan Raya Abepura-Kotaraja Telp. (0967) 582269 Jayapura</h4>
    </div>
    <hr class="garis_surat mt-2">
    <hr>
    <div class="text-center mt-2">
        <h4><u>SURAT PERINTAH PERJALANAN DINAS</u></h4>
        <h5>Nomor: {{ $surat->no_surat }}</h5>
    </div>

    <table class="table mt-4">
        <tbody>
            <tr>
                <td>
                    <p>Pejabat yang Berwenang Memberi Perintah</p>
                </td>
                <td>
                    <p>Kepala Dinas Olahraga dan Pemuda Provinsi Papua</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nama Pegawai / NIP</p>
                </td>
                <td>
                    <p><b>{{ $surat->pegawai->nama }}</b></p>
                    <p>{{ $surat->pegawai->NIP }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Pangkat dan Golongang Menurut PGPS-1968</p>
                    <p>Jabatan</p>
                    <p>Gaji Pokok</p>
                    <p>Tingkat Menurut Peraturan Perjalanan Dinas</p>
                </td>
                <td>
                    <p>{{ $surat->pegawai->pangkat }} ({{ $surat->pegawai->golongan }})</p>
                    <p>{{ $surat->pegawai->jabatan }}</p>
                    <p>-</p>
                    <p>{{ $surat->pegawai->tingkat }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Maksud Perjalanan Dinas</p>
                </td>
                <td>
                    <p>{{ $surat->maksud }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Alat Angkut yang Digunakan</p>
                </td>
                <td>
                    <p>{{ $surat->alat_angkut }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Tempat Berangkat</p>
                    <p>Tempat Tujuan</p>
                </td>
                <td>
                    <p>{{ $surat->dari }}</p>
                    <p>{{ $surat->tujuan }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Lama Perjalanan</p>
                    <p>Tanggal Berangkat</p>
                    <p>Tanggal Kembali</p>
                </td>
                <td>
                    <p>{{ $surat->lama }} Hari</p>
                    <p>{{ $surat->tgl_berangkat }}</p>
                    <p>{{ $surat->tgl_kembali }}</p>
                </td>
            </tr>
            @if ($surat->pengikut->count() > 0)
                <tr>
                    <td>Pengikut</td>
                    <td>
                        @foreach ($pengikut as $item)
                            <p><b>{{ $item->pegawai->nama }}</b></p>
                        @endforeach
                    </td>
                </tr>
            @endif
            <tr>
                <td>
                    <p>Pembebanan Anggaran</p>
                    <p>Mata Anggaran</p>
                </td>
                <td>
                    <p>{{ $surat->beban_anggaran }}</p>
                    <p>{{ $surat->mata_anggaran }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="ttd mt-4">
        <div class="float-right">
            <p><b>Dikeluarkan di: Jayapura</b></p>
            <p><b>Pada Tanggal: {{ Carbon::createFromFormat('Y-m-d', $surat->tgl_surat)->format('d M Y') }}</b></p>
            <hr>
            <div class="text-center mt-2">
                <p><b>Plt. Kepala Dinas Olahraga dan Pemuda</b></p>
                <p><b>Provinsi Papua</b></p>
                <br>
                <br>
                <br>
                <p><b>ALEXANDER K.Y. KAPISA, ST.</b></p>
                <p><b>PEMBINA</b></p>
                <p><b>NIP. 19781126 200502 1 002</b></p>
            </div>
        </div>
    </div>

</body>

</html>
