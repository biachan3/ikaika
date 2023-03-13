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
    <link rel="stylesheet" href="{{asset('css/custom-nvn.css')}}">

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
                <div class="col-sm-1 col-lg-1 col-xl-1 ml-5 mr-5">
                    <a href="/home" class="logo"><img
                            src="{{ asset('Ginger') }}/assets/img/Logo UBAYA FIX.svg"
                            alt="logo"></a>
                </div>

                <div class="col-sm-1 col-lg-1 col-xl-1">
                    <a href="/home" class="logo2"><img
                            src="{{ asset('Ginger') }}/assets/img/55 UBAYA.svg"
                            alt="logo"></a>
                </div>

                <div class="col-sm-1 col-lg-1 col-xl-1">
                    <a href="index.html" class="logo"><img src="{{ asset('Ginger') }}/assets/img/"
                            alt="logo"></a>
                </div>


                <div class="col-sm-9 col-lg-8 col-xl-6">
                    <nav class="nav-menu menu">
                        <ul class="nav-list">

                            {{-- <li><a href="#about" style="color: black;">about us</a></li>
                            <li><a href="#schedule" style="color: black;">schedule</a></li>
                            <li><a href="#location" style="color: black;">location</a></li> --}}
                            <!-- <li><a href="/event" style="color: black;">register</a></li> -->
                            <li><a href="#news" style="color: black;">Galeri IKA</a></li>
                            <li><a href="/faq" style="color: black;">FAQ</a></li>
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
                <!-- @if (!Auth::check())
<div class="col-md-3 col-lg-2 col-xl-3 conference-header-btn">
                        {{-- <a href="#register" class="btn"><span>Get Tickets</span></a> --}}
                        <form method="GET" action="{{ route('login') }}">

                            <button class="btn btn-primary w-100" type="submit">Log In</button>
                        </form>
                    </div>
@else
<div class="col-md-3 col-lg-2 col-xl-3 conference-header-btn">
                        {{-- <a href="#register" class="btn"><span>Get Tickets</span></a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-primary w-100" type="submit">Log Out</button>
                        </form>
                    </div>
@endif -->
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
    <script src="{{ asset('Ginger') }}/assets/js/jquery-2.2.4.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/rx-lazy.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/jquery.nice-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=you_googlemap_key"></script>
    <script src="{{ asset('Ginger') }}/assets/js/parallax.min.js"></script>
    <script src="{{ asset('Ginger') }}/assets/js/scripts.js"></script>
</body>

</html>
