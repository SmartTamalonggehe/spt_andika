@extends('admin.layouts.default')
@section('title', 'Halaman Bukti Perjalanan')

@section('surat', 'mm-active')

@php
$folder = 'bukti-perjalanan';
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
    @hasrole('pegawai')
        <button type="button" class="btn btn-outline-primary float-end" id="tambah">Tambah Data</button>
    @endhasrole
@endsection

@section('content')
    <div id="route" style="display: none"><?= $folder ?></div>
    <div id="surat_id" style="display: none">{{ $id }}</div>
    <div id="role" style="display: none">{{ auth()->user()->roles[0]->name }}</div>
    <div class="col-12">
        <p>
            Silahkan mengubah, menghapus, atau menambahkan data pengikut.
        </p>
        <table id="my_table" class="table dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    @hasrole('pegawai')
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
        const surat_id = document.getElementById('surat_id').innerHTML;
        $(document).ready(function() {
            let columns = [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'path_file',
                },
            ];
            const role = document.getElementById('role').innerHTML
            if (role == 'pegawai') {
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
                ajax: `/crud/${route.textContent}/${surat_id}`,
                columns
            });
        });
    </script>
@endsection
