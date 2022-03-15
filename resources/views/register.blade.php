<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 9 Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Laravel 9</b>Registration</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register</p>

      <form action="{{ route('saveregister') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" placeholder="Full name" value="{{ old('name') }}">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('confPassword') is-invalid @enderror"  name="password_confirmation" placeholder="Confirm Password" value="{{ old('confPassword') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('confPassword')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group row">

          <label for="gender" class="col-sm-2 col-form-label">Geneder</label>
          <div class="custom-control custom-radio">
            <input class="custom-control-input @error('gender') is-invalid @enderror" type="radio" id="male" name="gender" value="male" @if ( old('gender')=='male') @checked(true)
              
            @endif  >
            <label for="male" class="custom-control-label mr-2">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input class="custom-control-input @error('gender') is-invalid @enderror" type="radio" id="female" name="gender" value="female" @if ( old('gender')=="female") @checked(true)
              
            @endif >
            <label for="female" class="custom-control-label">Female</label>
          </div>
          
        </div>


        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">I already have a Laravel 9 membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
