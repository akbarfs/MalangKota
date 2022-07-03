<!DOCTYPE html>
<link rel="stylesheet" href="public/admin/assets/css/style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="public/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/admin/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="public/admin/assets/demo/demo.css" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
<div id="login-page">
    <div class="container">
      <form class="form-login" action="{{ url('/login') }}" method="POST">
        <h2 class="form-login-heading">Admin Dashboard</h2>
            <div class="login-wrap">
                 <sub style="margin:70px;">Sign in to start your session</sub>
                    @csrf
                    <hr>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    @error('email')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                    @if (session('status'))
                    <div class="alert alert-warning">{!! session()->get('status') !!}</div>
                    @endif 

                    <input type="password" class="form-control" placeholder="Password" name="password">
                    @error('password')
                    <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                    <br>
                    <button class="btn btn-theme-04 btn-block" type="submit" value="login" ><i class="fa fa-lock"></i> SIGN IN</button>
                    <hr>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="public/admin/lib/jquery/jquery.min.js"></script>
  <script src="public/admin/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="public/admin/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("public/admin/assets/img/bg-login.jpg", {
      speed: 500
    });
  </script>
</body>
</html>