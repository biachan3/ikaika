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
                    <a href="/home"><img src="{{ asset('Ginger') }}/assets/img/Logo UBAYA FIX.svg"
                            class="logo " alt="logo"></a>
    
                    <a href="/home"><img src="{{ asset('Ginger') }}/assets/img/55 UBAYA.svg"
                            class="logo " alt="logo"></a>
    
                    <a href="/home"><img src="{{ asset('Ginger') }}/assets/img/Logo IKA UBAYA.svg"
                            class="logo" alt="logo"></a>
    
                    <a href="/home"><img
                            src="{{ asset('Ginger') }}/assets/img/Stronger Together.svg" class="logo"></a>
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
                            <p>Silahkan melakukan registrasi <a href="{{route('user.order')}}">disini.</a> </p><br>
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
        {{-- <section class="s-testimonials">
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
        </section> --}}
        <!--================ S-TESTIMONIALS END ================-->

        <!--================ S-TESTIMONIALS END ================-->
        {{-- <section class="s-our-speaker team-our-speaker">
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
        </section> --}}
        <!--================ S-TESTIMONIALS END ================-->

        <!--==================== FOOTER ====================-->
        <footer>
            <div class="container" >
                <h2 class="title-conference"><span>Tentang Kami</span></h2>
                <div class="row justify-content-center">
                    <div class="footer-cont col-12 col-sm-6 col-lg-4 margin-ftr">
                        <div class="d-flex">
                            <a href="index.html" class="logo"><img
                                    src="{{ asset('Ginger') }}/assets/img/Logo_IKA_UBAYA.svg" alt="logo"
                                    style="width: 95px; height: 95px; margin-left: -10px;"></a>
                            <h2 class="h2-pad">IKA UBAYA</h2>
                        </div>
                        <ul class="footer-contacts">
                            <li class="footer-phone">
                                {{-- <i aria-hidden="true" class="fas fa-phone" style="display: contents;"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#0079FF"
                                    class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>
                                <a href="https://wa.me/+6281554971600" style="font-weight: 500; padding-left: 1px;">+62 815 5497 1600
                                </a>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0079FF" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                  </svg>
                                <a style="color: black; font-weight: 500; padding-left: 5px; font-size: 22px;">ika.ubaya1976@gmail.com</a>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#0079FF"
                                    class="bi bi-pin-map" viewBox="0 0 16 16" style="margin-top: 5px;">
                                    <path fill-rule="evenodd"
                                        d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                                    <path fill-rule="evenodd"
                                        d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                                </svg>
                                <a style="margin-top: 10px; color: black; font-weight: 500; padding-left: 10px; font-size: 20px; text-align:">Jl. Ngagel Jaya Selatan
                                    No.169, Pucang Sewu, Gubeng, Surabaya City, East
                                    Java 60284</a>
                                </div>
                                
                            </li>
                        </ul>
    
    
                        <h3 style="margin-top: 10px;">Social</h3>
                        <ul class="footer-list social-footer-ins">
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0079FF" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                              </svg><a target="_blank" href="https://www.facebook.com/ika.ubaya.9" style="padding-left: 5px;">IKA UBAYA</a></li>
    
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0079FF" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                              </svg><a target="_blank" href="https://www.instagram.com/ikaubaya/" style="padding-left: 5px;">Instagram</a></li>
                        </ul>
    
                        <div class="footer-copyright"><a target="_blank" href="">Creatoland</a> © 2023.
                            All Rights Reserved.</div>
                    </div>
                    {{-- <div class="footer-item-link col-12 col-sm-6 col-lg-4" style="display: flex;"> --}}
                    {{-- <div class="footer-link">
                            <h5>Event</h5>
                            <ul class="footer-list">
                                <li><a href="#about">About</a></li>
                                <li><a href="#news">News</a></li>
                                <li><a href="#news">Key figures</a></li>
                                <li><a href="#news">Runners' Photos</a></li>
                                <li><a href="#news">Results</a></li>
                                <li><a href="#news">Partners</a></li>
                            </ul>
                        </div> --}}
                    {{-- <div class="footer-link social-footer">
                        <h3>Social</h3>
                        <ul class="footer-list social-footer-ins">
                            <li><a target="_blank" href="https://www.facebook.com/rovadex">Facebook</a></li>
                            <li><a target="_blank" href="https://twitter.com/RovadexStudio">Twitter</a></li>
                            <li><a target="_blank" href="https://www.instagram.com/rovadex">Instagram</a></li>
                            <li><a target="_blank" href="https://www.youtube.com">Youtube</a></li>
                        </ul>
                    </div> --}}
                    {{-- </div> --}}
                    {{-- <div class="footer-subscribe col-12 col-sm-6 col-lg-4">
                        <h5>Subscribe to our newsletter. Stay up to date with our latest news and updates.</h5>
                        <form class="subscribe-form">
                            <input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
                            <button class="btn-form" type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                        <p>By clicking the button you agree to the <a href="#" target="_blank">Privacy Policy</a>
                            and <a href="#" target="_blank">Terms and Conditions</a></p>
                    </div> --}}
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
