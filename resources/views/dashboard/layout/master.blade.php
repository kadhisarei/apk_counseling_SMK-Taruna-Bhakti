<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Project Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('asset-db/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('asset-db/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset-db/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('asset-db/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">
    <link href="{{ asset('asset-db/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset-db/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('dashboard.component.leftsidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                @include('dashboard.component.topbar')
                <!-- end Topbar -->

                <!-- Start Content-->

                @yield('content')


                <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('dashboard.component.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    @include('dashboard.component.rightsidebar')
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="{{ asset('asset-db/js/vendor.min.js') }}"></script>
    <script src="{{ asset('asset-db/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('asset-db/js/vendor/Chart.bundle.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('asset-db/js/pages/demo.dashboard-projects.js') }}"></script>
    <!-- end demo js-->

    <!-- Datatables js -->
    <script src="{{asset('asset-db/js/vendor/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset-db/js/vendor/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('asset-db/js/vendor/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('asset-db/js/vendor/responsive.bootstrap5.min.js')}}"></script>'

    <!-- Datatable Init js -->
    <script src="{{asset('asset-db/js/pages/demo.datatable-init.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            $('#scroll-vertical-datatable').DataTable();
        });
    </script>    

</body>

</html>
