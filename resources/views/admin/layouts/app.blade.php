<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Halaman Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="public/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="public/admin/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link href="public/admin/assets/ckeditor" rel="stylesheet" />

</head>
<body>
    <div class="wrapper ">
        @include('admin.layouts.sidebar')

        @include('admin.layouts.header')
        <div class="content">
            @yield('content-header')

            @yield('main-content')
        </div>
        @include('admin.layouts.footer')
    </div>    
</body>
  <!--   Core JS Files   -->
  <script src="public/admin/assets/js/core/jquery.min.js"></script>
  <script src="public/admin/assets/js/core/popper.min.js"></script>
  <script src="public/admin/assets/js/core/bootstrap.min.js"></script>
  <script src="public/admin/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="public/admin/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="public/admin/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="public/admin/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="public/admin/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</html>