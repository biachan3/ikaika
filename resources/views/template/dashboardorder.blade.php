<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>IKA UBAYA</title>
    <!-- =================== META =================== -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('Ginger') }}/assets/img/favicon.png">
    <!-- =================== STYLE =================== -->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('Ginger') }}/assets/css/slick.min.css" />
    <link rel="stylesheet" href="{{ asset('Ginger') }}/assets/css/bootstrap-grid.css">
    <link href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Ginger') }}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('Ginger') }}/assets/css/style.css">
</head>

<body id="conference-page" style="background-image: url(assets/img/conference_bg.svg);">
    <!-- =============== PRELOADER =============== -->
    <div class="page-preloader-cover">
        <div class="cssload-loader">
            <div class="cssload-inner cssload-one"></div>
            <div class="cssload-inner cssload-two"></div>
            <div class="cssload-inner cssload-three"></div>
        </div>
    </div>
    <!-- ============== PRELOADER END ============== -->
    <!-- ================= HEADER ================= -->
    <!-- =============== HEADER END =============== -->
    @yield('content')
    <!-- =========== S-CONFERENCE-SLIDER =========== -->

    <!--================== FOOTER END ==================-->

    <!--=================== TO TOP ===================-->
    <a class="to-top" href="#home">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </a>
    <!--================= TO TOP END =================-->

    <!--=================== SCRIPT	===================-->
    <script src="{{ asset('Ginger') }}/assets/js/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/rx-lazy.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/jquery.nice-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=you_googlemap_key"></script>
    <script src="{{ asset('Ginger') }}/assets/js/parallax.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/scripts.js"></script>
</body>

</html>
