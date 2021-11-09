<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Swalayan @yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

    <!-- Page Specific CSS File -->
    <style>
        th {
            font-size: 15px !important;
        }
        
        td {
            font-size: 15px !important;
            text-transform: capitalize;
        }
    </style>
    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');

    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            
            <!-- Header -->
            @include('layouts.admin.partials.header')
            
            <!-- Sidebar -->
            @include('layouts.admin.partials.sidebar')

            <!-- Main Content -->
            @yield('content')
            
            <!-- Footer -->
            @include('layouts.admin.partials.footer')

            <!-- SweetAlert -->
            @include('sweetalert::alert')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('modules/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="{{ asset('modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('modules/chart.min.js') }}"></script>
    <script src="{{ asset('modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>

    <!-- Page Specific JS File -->
    @stack('script')

    <!-- Template JS File -->
    <script src="{{ asset('js/admin/scripts.js') }}"></script>
    <script src="{{ asset('js/admin/custom.js') }}"></script>
</body>

</html>
