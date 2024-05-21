<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Sistem Informasi Penjadwalan Tugas Akhir</title>
  <!-- Stylesheets and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ asset ('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset ('css/nucleo-svg.css')}}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('../assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset ('css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
  <link href="{{ asset ('/public/css/profile-picture.css')}}" rel="stylesheet" />
</head>

<body>
    @include('layouts.backend.navbar')

<div class="container my-3">
     @yield('content')
</div>
    @include('layouts.backend.footer')

  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="/public/js/profile-picture.js"></script>
</body>

</html>
