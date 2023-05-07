@extends('template.dashboardorder')

@section('content')

    <body id="conference-page">
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
        <header class="header-conference">
            {{-- <a href="#" class="nav-btn">
                <span></span>
                <span></span>
                <span></span>
            </a> --}}
            <div class="top-panel">
                {{-- <div class="container">
                    <a href="/home" class="logo"><img src="{{ asset('Ginger') }}/assets/img/Logo UBAYA FIX.svg"
                            alt="logo"></a>
                    <a href="/home" class="logo"><img src="{{ asset('Ginger') }}/assets/img/55 UBAYA.svg"
                            alt="logo"></a>
                    <a href="/home" class="logo"><img src="{{ asset('Ginger') }}/assets/img/Logo IKA UBAYA.svg"
                            alt="logo"></a>
                    <a href="/home" class="logo"><img src="{{ asset('Ginger') }}/assets/img/Stronger Together.svg"
                            alt="logo"></a>
                    {{-- <ul class="social-list">
					<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fab fa-facebook-f"></i></a></li>
					<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fab fa-twitter"></i></a></li>
					<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fab fa-instagram"></i></a></li>
					<li><a target="_blank" href="https://www.youtube.com"><i class="fab fa-youtube"></i></a></li>
				</ul>
                </div> --}}
                <div class="d-flex flex-row justify-content-center multi-nav">
                    <a href="/"><img src="{{ asset('Ginger') }}/assets/img/Logo_UBAYA_FIX.svg" class="logo "
                            alt="logo"></a>

                    <a href="/"><img src="{{ asset('Ginger') }}/assets/img/55_UBAYA.svg" class="logo "
                            alt="logo"></a>

                    <a href="/"><img src="{{ asset('Ginger') }}/assets/img/Logo_IKA_UBAYA.svg" class="logo"
                            alt="logo"></a>

                    <a href="/"><img src="{{ asset('Ginger') }}/assets/img/Stronger_Together.svg" class="logo"></a>
                </div>
            </div>
        </header>

        <!--=================== Card Photo ===================-->
        <section style="padding-top:40px;" style="object-fit: fill; background-image: url({{ asset('Ginger') }}/assets/img/BG IKA UBAYA.jpg);">
            <div class="" >
                <h2 class="title-conference"><span>Galeri Foto</span></h2>
                {{-- {{ dd($result) }} --}}`
                <div class="row justify-content-center" style="object-fit: fill; background-image: url({{ asset('Ginger') }}/assets/img/BG IKA UBAYA.jpg);">
                    <div class="" style=" width: 60%; box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
                    padding:20px 20px; border-radius:20px; margin-bottom:20px;">
                    {{-- <h1>{{ $result->id }}</h1> --}}
                    <img class="galeris" src="{{ asset('Ginger') }}/assets/img/{{ $result->image }}" alt="">
                    {{-- <h1>{{ $result->image }}</h1> --}}
                    {{-- <h1>{{ $result->date }}</h1> --}}
                    <h2 class="judul">{{ $result->judul }}</h2>
                    <p class="captionphoto">{{ $result->text }}</p>
                    <br/>
                    <img class="galeris" src="{{ asset('Ginger') }}/assets/img/{{ $result->image }}" alt="">
                    <p class="captionphoto">{{ $result->text }}</p>
                    <img class="galeris" src="{{ asset('Ginger') }}/assets/img/{{ $result->image }}" alt="">
                    <h2 class="judul">{{ $result->judul }}</h2>
                    <p class="captionphoto">{{ $result->text }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!--=================== Card Photo End ===================-->

        <!--=================== TO TOP ===================-->
        <a class="to-top" href="#home">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </a>
        <!--================= TO TOP END =================-->

        <!--=================== SCRIPT	===================-->
        <script src="assets/js/jquery-2.2.4.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
@endsection
