@extends('auth.default')
@section('title', 'Login')
@section('css')
    <style>
        .my-position {
            position: absolute;
            right: 20px;
            top: 8px;
            cursor: pointer;
        }

    </style>
@endsection
@section('content')

    <body
        style="background-image:url({{ url('/images/jembatan.jpg') }}); background-repeat: no-repeat; background-size: cover;">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('assets/images/logo/papua-1.png') }}" height="80"
                                        class="logo-dark mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Log In</b></h4>
                        <ul type="none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="text" required="" placeholder="Email"
                                            name="email" :value="old('email')">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="id_password" type="password" required=""
                                            placeholder="Password" name="password">
                                        <div class="my-position"><i id="togglePassword" class="ri-eye-line"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input id="remember_me" name="remember" type="checkbox"
                                                class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1" for="customCheck1">Ingat Saya</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
    @section('script')
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#id_password');

            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('ri-eye-off-line');
            });
        </script>
    @endsection

</body>
@endsection
