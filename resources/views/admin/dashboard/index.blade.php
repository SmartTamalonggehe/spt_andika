@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <select name="bulan" id="bulan" class="form-control">
                    <option value="" selected>Pilih Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-6">
                <select name="tahun" id="tahun" class="form-control">
                    <option value="" selected>Pilih Tahun</option>
                    @for ($i = 2020; $i <= 2022; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div id="chart-surat"></div>
        {{-- <h3 class="text-center text-uppercase">SELAMAT DATANG DI WEBSITE SPT DAN SPPD <br> dinas olahraga dan pemuda provinsi
            papua
        </h3>
        <img src="{{ asset('images/gedung.jpg') }}" class="img-fluid mx-auto d-block my-3 shadow-lg bg-body rounded"
            alt="...">
        <h4>Visi</h4>
        <p class="fs-5">Mewujudkan kebangkitan keolahragaan dan kepemudaan</p>
        <h4>Misi</h4>
        <p class="fs-5">Meningkatkan daya saing keolahragaan dan kepemudaan</p> --}}
    </div>
@endsection

@section('script')
    <script src="{{ mix('js/chart.js') }}"></script>
@endsection
