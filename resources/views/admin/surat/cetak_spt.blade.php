@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <!-- Bootstrap Css -->
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
            padding: 3px 0;
        }

        .table-borderless {
            border-collapse: collapse;
            float: left;
        }

        .table-borderless th {
            border: 1px solid rgb(31, 30, 30);
            padding: 8px 10px;
        }

        .table-borderless td {
            border: 1px solid rgb(31, 30, 30);
            padding: 5px 20px;
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
        <h4><u>SURAT PERINTAH TUGAS</u></h4>
        <h5>Nomor: {{ $surat->no_surat }}</h5>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <td width="130px">Dasar</td>
                <td width="1%">:</td>
                <td>{{ $surat->dasar }}</td>
            </tr>
            <tr>
                <th colspan="3">
                    <p class="text-center">MEMERINTAHKAN : </p>
                </th>
            </tr>
            <tr>
                <td>Kepada :</td>
            </tr>
            <tr>
                <td style="padding-left: 20px">Nama</td>
                <td>:</td>
                <td><b>{{ $surat->pegawai->nama }}</b></td>
            </tr>
            <tr>
                <td style="padding-left: 20px">NIP</td>
                <td>:</td>
                <td>{{ $surat->pegawai->NIP }}</td>
            </tr>
            <tr>
                <td style="padding-left: 20px">Pangkat/Golongan</td>
                <td>:</td>
                <td>{{ $surat->pegawai->pangkat }} ({{ $surat->pegawai->golongan }})</td>
            </tr>
            <tr>
                <td style="padding-left: 20px">Jabatan</td>
                <td>:</td>
                <td>{{ $surat->pegawai->jabatan }}</td>
            </tr>
            @if ($surat->pengikut->count() > 0)
                <tr>
                    <td style="padding-left: 5px"><b>Pengikut</b></td>
                </tr>
                @foreach ($pengikut as $item)
                    <tr>
                        <td style="padding-left: 20px">Nama</td>
                        <td>:</td>
                        <td><b>{{ $item->pegawai->nama }}</b></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px">NIP</td>
                        <td>:</td>
                        <td>{{ $item->pegawai->NIP }}</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px">Pangkat/Golongan</td>
                        <td>:</td>
                        <td>{{ $item->pegawai->pangkat }} ({{ $item->pegawai->golongan }})</td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px">Jabatan</td>
                        <td>:</td>
                        <td>{{ $item->pegawai->jabatan }}</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td valign="top">Untuk</td>
                <td valign="top">:</td>
                <td valign="top">
                    <ol>
                        <li>
                            Setrimanya Surat Perintah ini agar berangkat dari {{ $surat->dari }} ke
                            {{ $surat->tujuan }} (PP) pada {{ $surat->tanggal_berangkat }} dalam rangka
                            {{ $surat->maksud }}
                        </li>
                        <li>
                            Lama Perjalanan Dinas {{ $surat->lama }} hari.
                        </li>
                        <li>
                            Setelah melaksanakan kegiatan segera melaporkan hasilnya secara tertulis kepada Kepala Dinas
                            Olahraga dan Pemuda Provinsi Papua.
                        </li>
                        <li>
                            Biaya dibebankan kepada {{ $surat->beban_anggaran }}
                        </li>
                        <li>
                            Dilaksanakan dengan penuh rasa tanggung jawab.
                        </li>
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="ttd mt-3">
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
