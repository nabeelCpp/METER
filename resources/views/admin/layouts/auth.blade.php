<!--
=========================================================
* METER Dashboard 2 - v1.0.0
=========================================================

* Coded by M Nabeel Arshad

=========================================================

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{admin_asset() }}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{admin_asset() }}/assets/img/favicon.png">
  <title>
    {{ project_name() }} - Admin Login
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{admin_asset() }}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{admin_asset() }}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{admin_asset() }}/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      @yield('content')
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{admin_asset() }}/assets/js/core/popper.min.js"></script>
  <script src="{{admin_asset() }}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{admin_asset() }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{admin_asset() }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{admin_asset() }}/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
