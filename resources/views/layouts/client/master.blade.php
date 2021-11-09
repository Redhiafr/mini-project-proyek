<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Podomoro Mebel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/client/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/client/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/client/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/client/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/client/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/style.css') }}" type="text/css">

    @stack('style')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    @include('layouts.client.partials.offcanvas')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('layouts.client.partials.header')
    <!-- Header Section End -->

    <!-- Content Section -->
    @yield('content')
    <!-- Content Section End -->

    <!-- Footer Section Begin -->
    @include('layouts.client.partials.footer')
    <!-- Footer Section End -->

    <!-- Modal Login -->
    @include('layouts.client.partials.login')
    <!-- Modal Login End -->

    <!-- Modal Register -->
    @include('layouts.client.partials.register')
    <!-- Modal Register End -->

    <!-- SweetAlert -->
    @include('sweetalert::alert')

    <!-- Js Plugins -->
    <script src="{{ asset('js/client/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/client/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/client/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/client/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/client/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/client/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/client/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/client/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/client/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/client/main.js') }}"></script>
    <script src="{{ asset('js/client/modal.js') }}"></script>
    @stack('script')
</body>

</html>
