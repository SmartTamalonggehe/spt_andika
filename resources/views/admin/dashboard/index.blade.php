@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
    <div class="col-12">
        <div class="row">
            <h4 class="text-center">Grafik Perjalanan</h4>
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
                    @for ($i = 2020; $i <= 2023; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div id="chart-perjalanan"></div>
    </div>
    <div class="col-12 mt-5">
        <div class="row">
            <h4 class="text-center">Grafik Berdasarkan Surat</h4>
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
                    @for ($i = 2020; $i <= 2023; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div id="chart-surat"></div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('js/chart.js') }}"></script>
@endsection
