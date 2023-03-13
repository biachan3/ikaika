@extends('template.dashboardorder')

@section('content')
    {{-- <section class="s-conference-slider">
    <div class="conference-slider">
        <div
            class="conference-slide gambar-bg"style="background-image: url({{ asset('Ginger') }}/assets/img/background-s.svg);">
            <!-- <img class="conference-slide-effect" src="{{ asset('Ginger') }}/assets/img/effect-slider-left.svg"
                    alt="img">   -->

            <div class="container ">
                <div class="conference-slide-item ">
                    
                </div>
            </div>
        </div>
</section> --}}

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
        <header class="header-conference">
            <a href="#" class="nav-btn">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="top-panel">
                <div class="container">
                    <a href="/home" class="logo5"><img src="{{ asset('Ginger') }}/assets/img/Logo UBAYA FIX.svg"
                            alt="logo"></a>
                    <a href="/home" class="logo6"><img src="{{ asset('Ginger') }}/assets/img/55 UBAYA.svg"
                            alt="logo"></a>
                    <a href="/home" class="logo7"><img src="{{ asset('Ginger') }}/assets/img/Logo IKA UBAYA.svg"
                            alt="logo"></a>
                    <a href="/home" class="logo8"><img src="{{ asset('Ginger') }}/assets/img/Stronger Together.svg"
                            alt="logo"></a>
                    {{-- <ul class="social-list">
					<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fab fa-facebook-f"></i></a></li>
					<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fab fa-twitter"></i></a></li>
					<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fab fa-instagram"></i></a></li>
					<li><a target="_blank" href="https://www.youtube.com"><i class="fab fa-youtube"></i></a></li>
				</ul> --}}
                </div>
            </div>
        </header>
        <!-- =============== HEADER END =============== -->

        <!--=================== PAGE-TITLE ===================-->
        <div class="page-title page-title-conference"
            style='background-image: url("{{ asset('Ginger') }}/assets/img/background-s.svg");'>
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li>FAQ</li>
                    </ul>
                </div>
                <h1 class="title">Frequently Asked Question</h1>
            </div>
        </div>
        <!--================= PAGE-TITLE END =================-->

        <!--================ ABOUT THE SPEAKER ================-->
        {{-- <section class="s-our-mission s-about-speaker">
            <div class="container">
                <h2 class="title-conference"><span>About the speaker</span></h2>
                <div class="row">
                    <div class="col-lg-6 our-mission-img">
                        <span>
                            <img src="assets/img/our-mission-2.svg" alt="" class="mission-img-effect-1">
                            <img class="mission-img" src="assets/img/img-about-home2.jpg" alt="img">
                            <img src="assets/img/tringle-gray-little.svg" alt="" class="about-img-effect-2">
                        </span>
                    </div>
                    <div class="col-lg-6 our-mission-info">
                        <h4>Od tempor incididunt ut labore aliqua. ullamco laboris nisi ut aliquip</h4>
                        <div class="mission-info-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                        <ul class="social-list">
                            <li><a target="_blank" href="https://www.facebook.com/rovadex"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/RovadexStudio"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/rovadex"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a target="_blank" href="https://www.youtube.com"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--============== ABOUT THE SPEAKER END ==============-->

        <!--================= S-HAVE-PREPARED =================-->
        <section>
            <div class="event-schedule-tabs mt-5">
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Bagaimana cara mendaftarkan diri di Acara Reuni IKA?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Silahkan melakukan registrasi <a href="#index">disini.</a> </p><br>
                            <p>Jika sudah berhasil melakukan registrasi, Anda dapat membayar biaya kontribusi dengan
                                berbagai pilihan pembayaran.
                            </p><br>
                            <p>Setelah membayar, Anda akan mendapat QR Code yang dapat Anda tunjukkan pada panitia pada saat
                                registrasi masuk.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Bisakah saya mendaftarkan lebih dari 1 nama?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Bisa, namun Anda harus melakukan registrasi ulang.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Dimana acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA diadakan?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA akan diadakan di lapangan perpustakaan UBAYA
                                Tenggilis.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Kapan acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA diadakan?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA akan diadakan pada tanggal 3 Juni 2023.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Kapan Registrasi untuk acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA ditutup?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Registrasi akan ditutup pada 20 Mei 2023.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Siapa saja yang dapat mengikuti acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Seluruh Alumni UBAYA.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Pembayaran dapat dilakukan melalui apa saja?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Dapat menggunakan QRIS, Gopay, Dana, OVO.</p> <br>
                            <p>Virtual Account BCA, BNI, BRI.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Bagaimana jika terlambat pada saat acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Peserta yang hadir terlambat lebih dari 2 jam akan tertinggal acara yang sudah berlangsung
                                sebelumnya. Maka, diusahakan untuk datang tepat waktu.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Bagaimana jika berhalangan hadir pada saat acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Jika berhalangan hadir, maka tiket dinyatakan hangus dan uang pendaftaran tidak dapat
                                dikembalikan, dengan alasan apapun.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Berapa lama acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA berlangsung?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Acara dimulai pukul 15.00 - 21.00.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Apa Tema yang diangkat untuk acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Tema acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA adalah Stronger Together.</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-info active">
                        {{-- <div class="date">9:00 - 11:00</div> --}}
                        <h4>Dimana peserta bisa mendapatkan informasi mengenai acara Reuni Akbar 55 Tahun UBAYA oleh IKA
                            UBAYA?</h4>
                        <div class="schedule-info-content"
                            style="display: none; height: auto; padding: 0px 0px 0px; margin: 15px 0px 0px; width: 445px; opacity: 1;">
                            <p>Peserta dapat melihat informasi mengenai acara Reuni Akbar 55 Tahun UBAYA oleh IKA UBAYA pada
                                :</p><br>
                            <p>Website IKA UBAYA</p>
                            <p>Instagram IKA UBAYA </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="event-schedule-item">
                    <div class="schedule-item-img"><img class="rx-lazy rx-lazy_item" src="assets/img/event-icon-2.svg"
                            data-src="assets/img/event-icon-2.svg" alt="img">
                    </div>
                    <div class="schedule-item-info">
                        <div class="date">11:00 - 13:00</div>
                        <h4>Sed ut perspiciatis unde omnis</h4>
                        <div class="schedule-info-content">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis praesentium
                                volup</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-img"><img class="rx-lazy rx-lazy_item" src="assets/img/event-icon-3.svg"
                            data-src="assets/img/event-icon-3.svg" alt="img">
                    </div>
                    <div class="schedule-item-info">
                        <div class="date">13:00 - 14:00</div>
                        <h4>Ut enim ad minima veniam, quis</h4>
                        <div class="schedule-info-content">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis praesentium
                                volup</p>
                        </div>
                    </div>
                </div>
                <div class="event-schedule-item">
                    <div class="schedule-item-img"><img class="rx-lazy rx-lazy_item" src="assets/img/event-icon-4.svg"
                            data-src="assets/img/event-icon-4.svg" alt="img">
                    </div>
                    <div class="schedule-item-info">
                        <div class="date">14:00 - 15:00</div>
                        <h4>Quis autem vel eum iure reprehend</h4>
                        <div class="schedule-info-content">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus blanditiis praesentium
                                volup</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <!--=============== S-HAVE-PREPARED END ===============-->

        <!--================== S-TESTIMONIALS ==================-->
        <section class="s-testimonials">
            <div class="container">
                <h2 class="title-conference"><span>Testimonials</span></h2>
                <div class="slider-testimonial">
                    <div class="slide-testimonial">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonial-1.png" alt="img">
                            <h5 class="name">Sam piters</h5>
                            <div class="prof">Manager</div>
                            <p class="testimon-content">“Phasellus vestibulum nec dolor quis varius. Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit. Phasellus gravida magna sit amet euismod”</p>
                        </div>
                    </div>
                    <div class="slide-testimonial">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonial-2.png" alt="img">
                            <h5 class="name">Merryl Greens</h5>
                            <div class="prof">Manager</div>
                            <p class="testimon-content">“Phasellus vestibulum nec dolor quis varius. Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit. Phasellus gravida magna sit amet euismod”</p>
                        </div>
                    </div>
                    <div class="slide-testimonial">
                        <div class="testimonial-item">
                            <img src="assets/img/autor-img.png" alt="img">
                            <h5 class="name">Garry Smith</h5>
                            <div class="prof">clients</div>
                            <p class="testimon-content">“Phasellus vestibulum nec dolor quis varius. Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit. Phasellus gravida magna sit amet euismod”</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ S-TESTIMONIALS END ================-->

        <!--================ S-TESTIMONIALS END ================-->
        <section class="s-our-speaker team-our-speaker">
            <div class="container">
                <h2 class="title-conference"><span>Our Speaker</span></h2>
                <div class="slider-our-speaker">
                    <div class="slide-our-speaker">
                        <div class="our-speaker-item">
                            <img src="assets/img/single-speaker-1.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Eileen Walsh</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-our-speaker">
                        <div class="our-speaker-item">
                            <img src="assets/img/single-speaker-2.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Paul Bates</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-our-speaker">
                        <div class="our-speaker-item">
                            <img src="assets/img/single-speaker-3.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">David Green</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-our-speaker">
                        <div class="our-speaker-item">
                            <img src="assets/img/single-speaker-4.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Jennifer Oliver</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide-our-speaker">
                        <div class="our-speaker-item">
                            <img src="assets/img/single-speaker-2.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Paul Bates</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ S-TESTIMONIALS END ================-->

        <!--==================== FOOTER ====================-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="footer-cont col-12 col-sm-6 col-lg-4">
                        <a href="index.html" class="logo"><img src="assets/img/logo.svg" alt="logo"></a>
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
                                <li><a href="conference-page.html#about">About</a></li>
                                <li><a href="conference-page.html#news">News</a></li>
                                <li><a href="conference-page.html#news">Key figures</a></li>
                                <li><a href="conference-page.html#news">Runners' Photos</a></li>
                                <li><a href="conference-page.html#news">Results</a></li>
                                <li><a href="conference-page.html#news">Partners</a></li>
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
        <!--================== FOOTER END ==================-->

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
