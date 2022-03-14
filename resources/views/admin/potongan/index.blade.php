@extends('admin.layouts.default')
@section('title', 'Halaman Potongan')

@section('gaji', 'mm-active')

@php
use Carbon\Carbon;
$folder = 'potongan';
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
    @hasrole('admin')
        <button type="button" class="btn btn-outline-primary float-end" id="tambah">Tambah Data</button>
    @endhasrole
@endsection

@section('content')
    <div id="route" style="display: none"><?= $folder ?></div>
    <div id="gaji_id" style="display: none">{{ $gaji->id }}</div>
    <div id="role" style="display: none">{{ auth()->user()->roles[0]->name }}</div>
    <div class="col-12">
        <h5 class="mb-sm-0 mb-md-3">{{ $gaji->pegawai->NIP }} - {{ $gaji->pegawai->nama }}</h5>
        <p>
            Silahkan mengubah, menghapus, atau menambahkan data potongan gaji tanggal
            {{ Carbon::createFromFormat('Y-m-d', $gaji->tgl_gaji)->format('d M Y') }}.
        </p>
        <table id="my_table" class="table dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Potongan</th>
                    <th>Jml. Potongan</th>
                    @hasrole('admin')
                        <th>Aksi</th>
                    @endhasrole
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
        $(document).ready(function() {
            $('.currency').inputmask({
                alias: "currency",
                prefix: 'Rp. ',
                digits: 0,
                digitsOptional: false,
            });
        });
    </script>
    <script>
        const gaji_id = document.getElementById('gaji_id').innerHTML;
        $(document).ready(function() {
            let columns = [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nm_potongan',
                },
                {
                    data: 'jml_potongan',
                }
            ];
            const role = document.getElementById('role').innerHTML
            if (role == 'admin') {
                columns.push({
                    data: 'action',
                    orderable: false,
                    searchable: false
                })
            }
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
                ajax: `/crud/${route.textContent}/${gaji_id}/`,
                columns
            });
        });
    </script>
@endsection
