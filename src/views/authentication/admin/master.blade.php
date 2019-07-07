<!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Bestweby</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/bootstrap/css/bootstrap.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/animate/animate.css") }}">

    <link rel="stylesheet" href="{{ asset("vendor/font-awesome/css/font-awesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/magnific-popup/magnific-popup.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css") }}" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{ asset("vendor/owl.carousel/assets/owl.carousel.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/owl.carousel/assets/owl.theme.default.css") }}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset("css/theme.css") }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset("css/skins/default.css") }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset("css/custom.css") }}">

    <!-- Head Libs -->
    <script src="{{ asset("vendor/modernizr/modernizr.js") }}"></script>

</head>
<body>

@yield("content")

<!-- Vendor -->
<script src="{{ asset("vendor/jquery/jquery.js") }}"></script>
<script src="{{ asset("vendor/jquery-browser-mobile/jquery.browser.mobile.js") }}"></script>
<script src="{{ asset("vendor/popper/umd/popper.min.js")}}"></script>
<script src="{{ asset("vendor/bootstrap/js/bootstrap.js") }}"></script>
<script src="{{ asset("vendor/bootstrap-datepicker/js/bootstrap-datepicker.js") }}"></script>
<script src="{{ asset("vendor/common/common.js") }}"></script>
<script src="{{ asset("vendor/nanoscroller/nanoscroller.js") }}"></script>
<script src="{{ asset("vendor/magnific-popup/jquery.magnific-popup.js") }}"></script>
<script src="{{ asset("vendor/jquery-placeholder/jquery-placeholder.js") }}"></script>

<!-- Specific Page Vendor -->
<script src="{{ asset("vendor/jquery-appear/jquery-appear.js") }}"></script>
<script src="{{ asset("vendor/owl.carousel/owl.carousel.js") }}"></script>
<script src="{{ asset("vendor/isotope/isotope.js") }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('js/theme.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('js/theme.init.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('js/examples/examples.landing.dashboard.js') }}"></script>
</body>
</html>