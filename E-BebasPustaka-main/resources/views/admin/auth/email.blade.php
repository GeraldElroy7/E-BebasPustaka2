<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Layanan Virtual Perpustakaan ITS | Lupa Kata Sandi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>VRS ITS</b>
  </div>
  <div class="login-card-body login-card-body-shadow">
    <a href="/admin-login" style="color: black">
      <i class="fas fa-arrow-left"></i>
      <br>
    </a>
    <b>Atur ulang kata sandi</b> <br>
    Masukkan email yang terdaftar. Kami akan mengirimkan email verifikasi untuk atur ulang kata sandi. <br><br>
    <form method="POST" action="{{ url('forgot-password')}}">
      @csrf
      @if(session('error'))
      <div class="alert alert-dismissable alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('error')}}
      </div>
      @endif

      @if(session('success'))
      <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('success')}}
      </div>
      @endif

      <div class="form-group">
        {{-- <label for="email" class="font-weight-normal">Email</label> --}}
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" style="border: 0cm">
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Lanjut</button>
      </div>
    </form>
  </div>
  <!-- /.login-card-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
