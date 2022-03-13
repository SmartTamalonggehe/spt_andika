@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Gaji</title>

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
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
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

        .ttd {
            margin-top: 50px;
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
    <div class="kopsurat">
        <img src="{{ public_path('assets/images/logo/papua-1.png') }}" class="float-left img" alt="" srcset="">
        <img src="{{ public_path('assets/images/logo/papua-2.webp') }}" class="float-right img" alt="" srcset="">
        <div class="text-center">
            <h3>PEMERINTAH PROVINSI PAPUA</h3>
            <h2 class="mt-2">DINAS OLAHRAGA DAN PEMUDA</h2>
            <h4>Kotaraja Komplex Dinas Otonom Dedung A Lantai II</h4>
            <h4>Jalan Raya Abepura-Kotaraja Telp. (0967) 582269 Jayapura</h4>
        </div>
        <hr class="garis_surat mt-1">
        <hr>
    </div>

    <div class="text-center mt-3 text-underline">
        <p>SURAT KETERANGAN PERINCIAN GAJI</p>
    </div>
    <p class="mt-3">Bendahara Gaji Dinas Olahraga dan Pemuda Provinsi Papua, dengan ini menerangkan bahwa:</p>
    <table class="table mt-2">
        <tr>
            <td width="20%">Nama</td>
            <td width="1%" style="padding-left: 30px">: </td>
            <td>{{ $gaji->pegawai->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td width="1%" style="padding-left: 30px">: </td>
            <td>{{ $gaji->pegawai->NIP }}</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan</td>
            <td width="1%" style="padding-left: 30px">: </td>
            <td>{{ $gaji->pegawai->pangkat }} ({{ $gaji->pegawai->golongan }})</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td width="1%" style="padding-left: 30px">: </td>
            <td>{{ $gaji->pegawai->jabatan }}</td>
        </tr>
    </table>
    <p class="mt-3">Berdasarkan Gaji Bulan yang bersangkutan berpenghasilan sebagai berikut: </p>

    @php
        $jmlh_tunjangan = $gaji->tunjangan->count();
        $jmlh_potongan = $gaji->potongan->count();
        $totalTr = 0;
        $totalPenghasilan = 0;
        $totalPotongan = 0;
        if ($jmlh_tunjangan > $jmlh_potongan) {
            $totalTr = $jmlh_tunjangan;
        } elseif ($jmlh_potongan > $jmlh_tunjangan) {
            $totalTr = $jmlh_potongan;
        } else {
            $totalTr = $jmlh_tunjangan;
        }
        $totalTr += 2;
    @endphp
    <div class="isi-gaji">
        <table class="table-borderless mt-4">
            <thead>
                <tr>
                    <th colspan="2">Penghasilan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gaji Pokok</td>
                    <td>
                        <p class="text-right"><span
                                class="float-left">Rp.</span>{{ number_format($gaji->gaji_pokok, 0, '.', ',') }}
                        </p>
                    </td>
                </tr>
                @for ($i = 0; $i < $totalTr - 2; $i++)
                    @if ($i < $jmlh_tunjangan)
                        @php
                            $totalPenghasilan += $gaji->tunjangan[$i]->jml_tunjangan;
                        @endphp
                        <tr>
                            <td>{{ $gaji->tunjangan[$i]->nm_tunjangan }}</td>
                            <td width="100px">
                                <p class="text-right"><span class="float-left">Rp.</span>
                                    {{ number_format($gaji->tunjangan[$i]->jml_tunjangan, 0, '.', ',') }}</p>
                        </tr>
                    @else
                        <tr>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endif
                @endfor
                <tr>
                    <td>Pembulatan</td>
                    <td>
                        <p class="text-right"><span
                                class="float-left">Rp.</span>{{ number_format($gaji->pembulatan, 0, '.', ',') }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Penghasilan</td>
                    <td>
                        <p class="text-right">
                            <span class="float-left" style="margin-right: 40px">Rp.</span>
                            {{ number_format($totalPenghasilan + $gaji->pembulatan + $gaji->gaji_pokok, 0, '.', ',') }}
                        </p>
                </tr>
                <tr>
                    <td colspan="2">JUMLAH PENGHASILAN YANG DIBAYARKAN</td>
                </tr>
            </tbody>
        </table>
        <table class="table-borderless mt-4">
            <thead>
                <tr>
                    <th colspan="2">Potongan</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < $totalTr; $i++)
                    @if ($i < $jmlh_potongan)
                        @php
                            $totalPotongan += $gaji->potongan[$i]->jml_potongan;
                        @endphp
                        <tr>
                            <td>{{ $gaji->potongan[$i]->nm_potongan }}</td>
                            <td width="100px">
                                <p class="text-right">
                                    <span class="float-left">Rp.</span>
                                    {{ number_format($gaji->potongan[$i]->jml_potongan, 0, '.', ',') }}
                                </p>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endif
                @endfor
                <tr>
                    <td>Jumlah Potongan</td>
                    <td>
                        <p class="text-right"><span class="float-left" style="margin-right: 40px">Rp.</span>
                            {{ number_format($totalPotongan, 0, '.', ',') }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="text-right">
                            <span class="float-left">Rp.</span>
                            {{ number_format($totalPenghasilan + $gaji->pembulatan + $gaji->gaji_pokok - $totalPotongan, 0, '.', ',') }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="clearfix"></div>
    </div>
    <p class="mt-3 text-center">Demikian Surat Keterangan ini kami buat agar dapat dipergunakan seperlunya.</p>
    <p class="mt-4 text-right">Jayapura, {{ Carbon::createFromFormat('Y-m-d', $gaji->tgl_gaji)->format('d M Y') }}
    </p>
    <div class="ttd">
        <div class="float-left">
            <div class="text-center">
                <p>Mengetahui/Menyetujui:</p>
                <p>a.n. Kepala Dinas Olahraga dan Pemuda</p>
                <p>Provinsi Papua</p>
                <p>SEKRETARIS</p>
                <br>
                <br>
                <br>
                <br>
                <p>DR. RIVO MANANGSANGM, SE,M.Si</p>
                <p>PEMBINA TINGKAT I</p>
                <p>NIP. 19650203 198603 1 023</p>
            </div>
        </div>
        <div class="float-right">
            <div class="text-center">
                <br>
                <p>Bendahara Gaji</p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p>RISALLY IMELDA RETRAUBUNM S.Pd</p>
                <p>PENATA MUDA TK.I</p>
                <p>NIP. 19780531 200012 2 007</p>
            </div>
        </div>
    </div>
</body>

</html>
