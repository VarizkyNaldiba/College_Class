<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body text-center">
                <h3 class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout Berhasil</h3>
                <p class="login-box-msg">Anda telah keluar dari sistem.</p>
                <a href="{{ url('login') }}" class="btn btn-primary btn-block">Kembali ke Login</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Logout Berhasil',
                text: 'Anda telah keluar dari sistem.',
                confirmButtonText: 'OK'
            });
        });
    </script>

</body>

</html>
