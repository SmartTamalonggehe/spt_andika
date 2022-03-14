@php
use Carbon\Carbon;
@endphp

<div class="kopsurat">
    <div class="text-center">
        <h3>PERINCIAN BIAYA PERJALANAN DINAS / PINDAH / PENSIUN</h3>
        <h3>DASAR SKEP GUB. PROV PAPUA NO. 130 THN 2004 TGL. 12 MARET 2004</h3>
    </div>
    <hr>
</div>
<div class="text-center mt-3">
    <h4>DAFTAR PENGELUARAN RILL</h4>
</div>
<table class="table mt-3">
    <tr>
        <td width="100px">No dan Tgl. SPT</td>
        <td width="10px">:</td>
        <td>{{ $surat->no_surat }}
            <span
                style="margin-left: 50px">{{ Carbon::createFromFormat('Y-m-d', $surat->tgl_surat)->format('d M Y') }}</span>
        </td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><b>{{ $surat->pegawai->nama }}</b></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td>:</td>
        <td>{{ $surat->pegawai->NIP }}</td>
    </tr>
    <tr>
        <td>Pangkat/Gol</td>
        <td>:</td>
        <td>{{ $surat->pegawai->pangkat }} / {{ $surat->pegawai->golongan }}</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $surat->pegawai->jabatan }}</td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td>:</td>
        <td>{{ $surat->pegawai->instansi }}</td>
    </tr>
    <tr>
        <td>Kode Rek.</td>
        <td>:</td>
        <td>{{ $kwitansi->kode_rek }}</td>
    </tr>
</table>

<table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Uraian</th>
        <th>Lama</th>
        <th>Jumlah</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Tiket {{ $surat->alat_angkut }}</td>
        <td>Pergi= Rp. {{ number_format($kwitansi->pergi) }} + Pulang= Rp. {{ number_format($kwitansi->pulang) }}
        </td>
        <td>Rp. {{ number_format($kwitansi->pergi + $kwitansi->pulang) }}</td>
    </tr>
    @php
        $no = 1;
        $total = 0;
    @endphp
    @foreach ($kwitansi->kwitansiDetail as $item)
        @php
            $no++;
            $total += $item->jumlah * $item->lama;
        @endphp
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $item->uraian }}</td>
            <td>{{ $item->lama }} Hari x Rp. {{ number_format($item->jumlah, 0, '.', ',') }}</td>
            <td>Rp. {{ number_format($item->jumlah * $item->lama, 0, '.', ',') }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">Jumlah Seluruhnya</td>
        <td>Rp. {{ number_format($total + $kwitansi->pergi + $kwitansi->pulang) }}</td>
    </tr>
</table>

<div class="ttd" style="margin-top: 30px;">
    <p class="text-right" style="margin-bottom: 20px">Jayapura
        {{ Carbon::createFromFormat('Y-m-d', $surat->tgl_surat)->format('d M Y') }}
    </p>
    <div class="float-left">
        <div class="text-center">
            <p>Bendahara Pengeluaran,</p>
            <br>
            <br>
            <br>
            <p><b>FEBRIAN R.N NATAN, A.Md.</b></p>
            <p><b>NIP. 19860201 2010004 2 003</b></p>
        </div>
    </div>
    <div class="float-right">
        <div class="text-center">
            <p>Yang Menerima</p>
            <br>
            <br>
            <br>
            <p><b>{{ $surat->pegawai->nama }}</b></p>
            <p><b>{{ $surat->pegawai->NIP }}</b></p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<h2 class="text-underline text-center" style="margin-top: 40px">PERHITUNGAN SPPD RAMPUNG</h2>
<table class="mt-3">
    <tr>
        <td>Ditetapkan jumlah uang</td>
        <td>Rp. {{ number_format($kwitansi->jumlah_ditetapkan) }}</td>
    </tr>
    <tr>
        <td>Yang Telah dibayarkan</td>
        <td>Rp. {{ number_format($kwitansi->jumlah_terima) }}</td>
    </tr>
    <tr>
        <td>Selisih kurang/lebih</td>
        <td>Rp. {{ number_format($kwitansi->jumlah_ditetapkan - $kwitansi->jumlah_terima) }}</td>
    </tr>
</table>

<div class="ttd" style="margin-top: 30px;">
    <div class="float-left">
        <div class="text-center">
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
            <p>PPK,</p>
            <br>
            <br>
            <br>
            <p><b>ENDANG PURNAMAWATI, SE., M.Si.</b></p>
            <p><b>NIP. 19670723 198903 2 006</b></p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
