<!--
=========================================================
* METER Dashboard 2 - v1.0.0
=========================================================

* Coded by M Nabeel Arshad

=========================================================

-->
@php
    $direction = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $direction }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ admin_asset() }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ admin_asset() }}/assets/img/favicon.png">
    <title>
        {{ project_name() }} - {{__('admin.Admin Dashboard')}}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ admin_asset() }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ admin_asset() }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ admin_asset() }}/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @stack('css')
</head>

<body class="g-sidenav-show {{$direction}} bg-gray-200">
    @include('admin.layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('admin.layouts.inc.topbar')
        <!-- End Navbar -->
        @yield('content')
    </main>

    <!--   Core JS Files   -->
    <script src="{{ admin_asset() }}/assets/js/core/popper.min.js"></script>
    <script src="{{ admin_asset() }}/assets/js/core/bootstrap.min.js"></script>
    <script src="{{ admin_asset() }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ admin_asset() }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{ admin_asset() }}/assets/js/plugins/chartjs.min.js"></script>
    @stack('js')
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
    <script src="{{ admin_asset() }}/assets/js/material-dashboard.min.js?v=3.0.0"></script>
    @stack('script')
</body>

</html>
