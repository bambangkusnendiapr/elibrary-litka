<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Library Login</title>
  {{-- Tell the browser to be responsive to screen width --}}
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="{{ url('assets/img/logo.png') }}" rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="{{url('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  {{-- Ionicons --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  {{-- icheck bootstrap --}}
  <link rel="stylesheet" href="{{url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  {{-- Theme style --}}
  <link rel="stylesheet" href="{{url('adminlte/dist/css/adminlte.min.css')}}">
  {{-- Google Font: Source Sans Pro --}}
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<div class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="{{url('assets/img/logo.png')}}" width="75%" height="75%">
    </div>
    {{-- /.login-logo --}}

    <div class="login-box-body">
      <div class="card">
        @if ($message = Session::get('store'))
          <div class="card-header text-center">{{$message}}</div>
        @endif
        <div class="card-body login-card-body">
          
          <form action="{{route('login')}}" method="post">
            @csrf

            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
              <input id="password-field" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required autocomplete="current-password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="row">
              <div class="col-8">
                <span toggle="#password-field" class="fa fa-eye toggle-password"> Show / Hide Password</span>
              </div>
              {{-- /.col --}}
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="fas fa-sign-in-alt"></span> Sign In</button>
              </div>
              {{-- /.col --}}
            </div>
          </form>
          {{-- <div class="social-auth-links text-center">
            <p>- Atau -</p>
            <a href="#" class="btn btn-link">
              <i class="fas fa-edit"></i>
              Daftar Akun
            </a>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    <i class="fas fa-lock"></i> Lupa Password
                </a>
            @endif
          </div> --}}

        </div>
        {{-- /.login-card-body --}}
      </div>
    </div>
  </div>
  {{-- /.login-box --}}
</div>

{{-- jQuery --}}
<script src="{{url('adminlte/plugins/jquery/jquery.min.js')}}"></script>
{{-- Bootstrap 4 --}}
<script src="{{url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- AdminLTE App --}}
<script src="{{url('adminlte/dist/js/adminlte.min.js')}}"></script>

<script src="{{url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
  });
</script>

</body>
</html>