@extends('admin.layouts.default')
@section('title', 'Halaman Surat')

@php
$folder = 'surat';
@endphp

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    {{-- Date --}}
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('btn_tambah')
    @hasrole('kepegawaian')
        <button type="button" class="btn btn-outline-primary float-end" id="tambah">Tambah Data</button>
    @endhasrole
@endsection

@section('content')
    <div id="route" style="display: none"><?= $folder ?></div>
    <div id="jenis_surat" style="display: none">{{ $jenis }}</div>
    <div id="tgl_awal" style="display: none">{{ $request->tgl_awal }}</div>
    <div id="tgl_akhir" style="display: none">{{ $request->tgl_akhir }}</div>
    <div class="col-12">
        <p>
            Silahkan mengubah, menghapus, atau menambahkan data surat {{ $jenis }} {{ $request->tgl_awal }}.
        </p>
        <form action="" method="get">
            <div class="row mb-4">
                <p>
                    Tampilkan data berdasarkan tanggal:
                </p>
                <div class="col-8">
                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M yyyy"
                        data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                        <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal" />
                        <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir" />
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-secondary">Tampilkan</button>
                </div>
            </div>
        </form>

        <table id="my_table" class="table dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No {{ $jenis }}</th>
                    <th>Tgl. surat</th>
                    <th>Nama Pegawai</th>
                    <th>Dasar</th>
                    <th>Dari</th>
                    <th>Tujuan</th>
                    <th>Maksud</th>
                    <th>Alat angkut</th>
                    <th>Lama</th>
                    <th>Tgl. berangkat</th>
                    <th>Tgl. kembali</th>
                    <th>Beban anggaran</th>
                    <th>Mata anggaran</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Pengikut</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    @include("admin.$folder.form")
@endsection

@section('script')
    <script src="{{ mix('js/crud.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- Form Validation --}}
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    {{-- Date --}}
    <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    {{-- input mask --}}
    <script src="{{ asset('assets/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>

    <script>
        const jenis_surat = document.getElementById('jenis_surat').innerHTML;
        $(document).ready(function() {
            $("#my_table").DataTable({
                scrollX: true,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                processing: true,
                serverSide: true,
                order: [
                    [1, 'asc']
                ],
                ajax: `/crud/${route.textContent}?id=${jenis_surat}&&tgl_awal=${document.getElementById('tgl_awal').innerHTML}&&tgl_akhir=${document.getElementById('tgl_akhir').innerHTML}`,
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'no_surat',
                    },
                    {
                        data: 'tgl_surat',
                    },
                    {
                        data: 'pegawai.nama',
                    },
                    {
                        data: 'dasar',
                    },
                    {
                        data: 'dari',
                    },
                    {
                        data: 'tujuan',
                    },
                    {
                        data: 'maksud',
                    },
                    {
                        data: 'alat_angkut',
                    },
                    {
                        data: 'lama',
                    },
                    {
                        data: 'tgl_berangkat',
                    },
                    {
                        data: 'tgl_kembali',
                    },
                    {
                        data: 'beban_anggaran',
                    },
                    {
                        data: 'mata_anggaran',
                    },
                    {
                        data: 'keterangan',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'pengikut',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
