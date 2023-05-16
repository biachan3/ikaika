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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <header class="conference-header-fixed header-fixed">

        <a href="#" class="nav-btn">
            <span></span>
            <span></span>
            <span></span>
        </a>

        <div class="row conference-header-row">
            <div class="d-flex flex-row justify-content-center multi-nav">
                <a href="/" class="logo3"><img src="{{ asset('Ginger') }}/assets/img/Logo_UBAYA_FIX.svg"
                        class="logo" alt="logo"></a>

                <a href="/" class="logo3"><img src="{{ asset('Ginger') }}/assets/img/55_UBAYA.svg" class="logo"
                        alt="logo"></a>

                <a href="/" class="logo3"><img src="{{ asset('Ginger') }}/assets/img/Logo_IKA_UBAYA.svg"
                        class="logo" alt="logo"></a>

                <a href="/" class="logo4"><img src="{{ asset('Ginger') }}/assets/img/Stronger_Together.svg"
                        class="logo"></a>
            </div>

            <nav class="nav-menu menu">

                <ul class="nav-list">
                    <li><a href="/#news" class="clor">Galeri IKA</a></li>
                    <li><a href="/faq" class="clor">FAQ</a></li>

                    {{-- <li><a href="{{ route('user.order') }}" style="color: black;">Daftar</a></li> --}}
                    {{-- <li><a href="#conference-team.html" style="color: black;">Conference Team</a></li> --}}
                    {{-- <li class="dropdown">
								<a href="#">pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul>

									<li><a href="dance-team.html">Dance Teame</a></li>
									<li><a href="blog.html">Blog</a></li>
									<li><a href="page-error.html">Page Error 404</a></li>
								</ul>
							</li> --}}
                </ul>

            </nav>
        </div>
    </header>
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
    @yield('script')
    <script src="{{ asset('Ginger') }}/assets/js/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/rx-lazy.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/jquery.nice-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=you_googlemap_key"></script>
    <script src="{{ asset('Ginger') }}/assets/js/parallax.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
