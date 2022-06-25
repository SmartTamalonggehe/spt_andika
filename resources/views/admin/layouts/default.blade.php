<!doctype html>
<html lang="en">

{{-- head --}}
@include('layouts.head')

<body>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">

        {{-- Header --}}
        @include('admin.layouts.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.leftSidebar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">@yield('title')</h4>
                                @yield('btn_tambah')
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    {{-- content --}}
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>

                    </div>
                    {{-- end content --}}
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Andika.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by KingProP4W
                                {{-- Upcube --}}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    {{-- script --}}
    @include('layouts.script')
    <script src="{{ mix('js/components.js') }}" defer></script>
</body>

</html>
