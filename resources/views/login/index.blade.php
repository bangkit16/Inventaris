<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<style>
    body {
        background-size: cover;
        background-repeat: no-repeat;
        background-color: rgb(24, 106, 178);
        background-image: url({{ asset('img/gedungjti.png') }});
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box       ">
        <!-- /.login-logo -->
        <div class="card  ">
            <div class="card-body text-center">
                <img src="{{ asset('img/polinema.png') }}" class="" alt=""><br><br>

                <form action="/login " method="post">
                    @csrf
                    <div class="input-group mb-3 form-floating">
                        <input style="background-color: #DDE3EC;border-radius: 10px;border: none" type="text"
                            class="form-control  @error('username') is-invalid @enderror" placeholder="NIP"
                            id="username" value="{{ old('username') }}" name="username">


                    </div>
                    <div class="input-group mb-3 form-floating">
                        <input style="background-color: #DDE3EC;border-radius: 10px;border: none" type="password"
                            class="form-control  @error('password') is-invalid @enderror" placeholder="Password"
                            id="password" name="password">
                    </div>
                    <div class="row justify-content-center">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-block rounded mt-3"
                                style="background-color: #4CB8DA;color : white"><strong>LOGIN</strong></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                {{-- <p class="mb-0 d-block mt-3">
                    <a href="/register" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-secondary text-center">
                2024 Copyright Sistem Informasi Inventaris JTI 
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src=" {{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
