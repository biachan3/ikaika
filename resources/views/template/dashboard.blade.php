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
    <header class="conference-header-fixed header-fixed">
        <a href="#" class="nav-btn">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="container">
            <div class="row conference-header-row">
                <div class="col-sm-1 col-lg-1 col-xl-1">
                        <a href="index.html" class="logo"><img src="{{ asset('Ginger') }}/assets/img/LOGO UBAYA FIX CS5-02_adobe_express.svg"
                                alt="logo"></a>
                </div>

                <div class="col-sm-1 col-lg-1 col-xl-1">
                    <a href="index.html" class="logo"><img src="{{ asset('Ginger') }}/assets/img/LOGO 55 UBAYA - COLORED_adobe_express.svg"
                            alt="logo"></a>
                </div>

                <div class="col-sm-1 col-lg-1 col-xl-1">
                    <a href="index.html" class="logo"><img src="{{ asset('Ginger') }}/assets/img/"
                            alt="logo"></a>
                </div>


                <div class="col-sm-9 col-lg-8 col-xl-6">
                    <nav class="nav-menu menu">
                        <ul class="nav-list">

                            <li><a href="#about" style="color: black;">about us</a></li>
                            <li><a href="#schedule" style="color: black;">schedule</a></li>
                            <li><a href="#location" style="color: black;">location</a></li>
                            <!-- <li><a href="/event" style="color: black;">register</a></li> -->
                            <li><a href="#news"style="color: black;">news</a></li>
                            {{-- <li class="dropdown">
								<a href="#">pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul>
									<li><a href="conference-team.html">Conference Team</a></li>
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
        </div>
    </header>
    <!-- =============== HEADER END =============== -->
    <body>
        @yield('content')
    </body>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-cont col-12 col-sm-6 col-lg-4">
                    <a href="index.html" class="logo"><img src="{{ asset('Ginger') }}/assets/img/logo.svg"
                            alt="logo"></a>
                    <p>7100 Athens Place Washington, DC 20521</p>
                    <ul class="footer-contacts">
                        <li class="footer-phone">
                            <i aria-hidden="true" class="fas fa-phone"></i>
                            <a href="tel:+18001234567">1-800-1234-567</a>
                        </li>
                        <li class="footer-email">
                            <a href="mailto:rovadex@gmail.com">rovadex@gmail.com</a>
                        </li>
                    </ul>
                    <div class="footer-copyright"><a target="_blank" href="https://rovadex.com">Rovadex</a> © 2019.
                        All Rights Reserved.</div>
                </div>
                <div class="footer-item-link col-12 col-sm-6 col-lg-4">
                    <div class="footer-link">
                        <h5>Event</h5>
                        <ul class="footer-list">
                            <li><a href="#about">About</a></li>
                            <li><a href="#news">News</a></li>
                            <li><a href="#news">Key figures</a></li>
                            <li><a href="#news">Runners' Photos</a></li>
                            <li><a href="#news">Results</a></li>
                            <li><a href="#news">Partners</a></li>
                        </ul>
                    </div>
                    <div class="footer-link">
                        <h5>Social</h5>
                        <ul class="footer-list">
                            <li><a target="_blank" href="https://www.facebook.com/rovadex">Facebook</a></li>
                            <li><a target="_blank" href="https://twitter.com/RovadexStudio">Twitter</a></li>
                            <li><a target="_blank" href="https://www.instagram.com/rovadex">Instagram</a></li>
                            <li><a target="_blank" href="https://www.youtube.com">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-subscribe col-12 col-sm-6 col-lg-4">
                    <h5>Subscribe to our newsletter. Stay up to date with our latest news and updates.</h5>
                    <form class="subscribe-form">
                        <input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
                        <button class="btn-form" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                    <p>By clicking the button you agree to the <a href="#" target="_blank">Privacy Policy</a>
                        and <a href="#" target="_blank">Terms and Conditions</a></p>
                </div>
            </div>
        </div>
    </footer>
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
