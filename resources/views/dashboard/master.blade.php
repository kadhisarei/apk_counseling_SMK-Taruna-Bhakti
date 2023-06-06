<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/styles.min.css') }}">
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    @include('dashboard.layouts.sidebar')

    @yield('content')

    </div>

</body>
  <script src="{{ asset('assets-dashboard/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets-dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-dashboard/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets-dashboard/js/app.min.js') }}"></script>
  <script src="{{ asset('assets-dashboard/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets-dashboard/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets-dashboard/js/dashboard.js') }}"></script>
</html>