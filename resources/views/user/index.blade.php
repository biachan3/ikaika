<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@extends('template.dashboard')

@section('css')
    <style>
        .gambar-bg {
            object-fit: fill;
            background-image: url("{{ asset('Ginger') }}/assets/img/BG IKA.svg");
        }
    </style>
@endsection
@section('content')
    <section class="s-conference-slider">
        <div class="conference-slider">
            <div class="conference-slide gambar-bg"
                style="background-image: url({{ asset('Ginger') }}/assets/img/BG IKA.svg);">
                <div class="container ">
                    {{-- <a href="single-blog.html"><img
                            src="{{ asset('Ginger') }}/assets/img/" alt="img" width="1920" height="1080" style="opacity: 50%;"></a> --}}
                    <img src="{{ asset('Ginger') }}/assets/img/Poster IKA.jpg" alt="img" width="37%" height="100%"
                        style="opacity: 85%; margin-right: 220px;">
                    <div class="conference-slide-item">
                        <div class="date">3 Juni 2023</div>
                        <!-- <div class="conference-slider-title">Acara</div> -->
                        <h2 class="title"><span>Reuni Akbar 55 Tahun UBAYA</span></h2>
                        <form method="GET" action="{{ route('user.order') }}">
                            <div class="btn-form-cover">
                                <a href="{{ route('user.order') }}">
                                    <button id="#submit" type="submit" class="btn">
                                        <span>Daftar Sekarang!</span>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="conference-slide" style="background-image: url({{ asset('Ginger') }}/assets/img/background-s.svg);">
                <!-- <img class="conference-slide-effect" src="{{ asset('Ginger') }}/assets/img/bg 1-03.svg"
                        alt="img"> -->
                <div class="container"> <a href="single-blog.html"><img
                            src="{{ asset('Ginger') }}/assets/img/Pak Rektor.jpeg" alt="img"></a>
                    <div class="conference-slide-item">
                        <div class="date">21 dec 2023</div>
                        <div class="conference-slider-title">Dedicated To</div>
                        <h2 class="title"><span>Your Success</span></h2>
                        <form method="GET" action="">
                            <div class="btn-form-cover">
                                <button id="#submit" type="submit" class="btn"><span>Daftar Sekarang!</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- ========= S-CONFERENCE-SLIDER END ========= -->

    <!-- =========== S-CONFERENCE-COUNTER =========== -->
    <section id="about" class="s-conference-mission"
        style="background-image: url({{ asset('Ginger') }}/assets/img/bg-about-home2.png);">
        <div class="s-conference-counter">
            <div class="container">
                <div class="conference-counter-wrap">
                    <img class="conference-counter-effect-1" src="{{ asset('Ginger') }}/assets/img/counter-icon-1.svg"
                        alt="img">
                    <div class="conference-counter-cover">
                        <h4>Waktu Penutupan Registrasi Tersisa</h4>
                        <div id="clockdiv" class="clock-timer clock-timer-conference">
                            <div class="clock-item days-item">
                                <span class="days"></span>
                                <div class="smalltext">Days</div>
                            </div>
                            <div class="clock-item hours-item">
                                <span class="hours"></span>
                                <div class="smalltext">Hours</div>
                            </div>
                            <div class="clock-item minutes-item">
                                <span class="minutes"></span>
                                <div class="smalltext">Minutes</div>
                            </div>
                            <div class="clock-item seconds-item">
                                <span class="seconds"></span>
                                <div class="smalltext">Seconds</div>
                            </div>
                        </div>
                    </div>
                    <img class="conference-counter-effect-2" src="{{ asset('Ginger') }}/assets/img/counter-icon-2.svg"
                        alt="img">
                </div>
            </div>
        </div>
        {{-- <div class="s-our-mission s-about-speaker">
            <div class="container">
                <h2 class="title-conference"><span>Our mission</span></h2>
                <div class="row">
                    <div class="col-lg-6 our-mission-img">
                        <span>
                            <img src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/our-mission-2.svg" alt=""
                                class="mission-img-effect-1 rx-lazy">
                            <img class="mission-img rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/img-about-home2.jpg" alt="img">
                            <img src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/tringle-gray-little.svg" alt=""
                                class="about-img-effect-2 rx-lazy">
                        </span>
                    </div>
                    <div class="col-lg-6 our-mission-info">
                        <ul class="mission-meta">
                            <li><i aria-hidden="true" class="fas fa-map-marker-alt"></i>London</li>
                            <li><i aria-hidden="true" class="fas fa-calendar-alt"></i>31.10.2019</li>
                            <li><i class="far fa-clock"></i>14:00 AM - 19:00 AM</li>
                        </ul>
                        <h4>Od tempor incididunt ut labore aliqua. ullamco laboris nisi ut aliquip</h4>
                        <div class="mission-info-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusm od tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip</p>
                        </div>
                        <div class="mission-list-cover">
                            <ul class="mission-list">
                                <li><i class="fas fa-chevron-right"></i>Lorem ipsum dolor sit amet</li>
                                <li><i class="fas fa-chevron-right"></i>Consectetur adipiscing elit</li>
                                <li><i class="fas fa-chevron-right"></i>Eiusmod tempor incididunt ut</li>
                            </ul>
                            <ul class="mission-list">
                                <li><i class="fas fa-chevron-right"></i>Lorem ipsum dolor sit amet</li>
                                <li><i class="fas fa-chevron-right"></i>Consectetur adipiscing elit</li>
                                <li><i class="fas fa-chevron-right"></i>Eiusmod tempor incididunt ut</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- ========= S-CONFERENCE-COUNTER END ========= -->

    <!-- ============ SPEAKER & SCHEDULE ============ -->
    {{-- <section id="schedule" class="s-speakers-schedule">
        <div class="container">
            <h2 class="title-conference"><span>Speaker & Schedule</span></h2>
            <div class="speakers-timeline-cover">
                <div class="speakers-timeline-item">
                    <div class="speakers-timeline-img">
                        <a href="conference-team.html" class="our-speaker-item">
                            <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/speaker-1.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Eileen Walsh</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </a>
                    </div>
                    <div class="speakers-timeline-info">
                        <div class="date">8:30 AM - 9:30 AM</div>
                        <h3 class="title">Teamwork all you need <br>to know the manager</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="speakers-timeline-item">
                    <div class="speakers-timeline-img">
                        <a href="conference-team.html" class="our-speaker-item">
                            <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/speaker-2.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">David Green</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </a>
                    </div>
                    <div class="speakers-timeline-info">
                        <div class="date">10:30 AM - 11:30 AM</div>
                        <h3 class="title">24/7 Service <br>how to make a client happy</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="speakers-timeline-item">
                    <div class="speakers-timeline-img">
                        <a href="conference-team.html" class="our-speaker-item">
                            <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/speaker-3.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Jennifer Oliver</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </a>
                    </div>
                    <div class="speakers-timeline-info">
                        <div class="date">12:30 AM - 13:30 AM</div>
                        <h3 class="title">Everything about <br>market analytics</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="speakers-timeline-item">
                    <div class="speakers-timeline-img">
                        <a href="conference-team.html" class="our-speaker-item">
                            <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                                data-src="{{ asset('Ginger') }}/assets/img/speaker-4.jpg" alt="img">
                            <div class="speaker-item-info">
                                <h3 class="name">Paul Bates</h3>
                                <p class="prof">Business Manager</p>
                            </div>
                        </a>
                    </div>
                    <div class="speakers-timeline-info">
                        <div class="date">14:30 AM - 15:30 AM</div>
                        <h3 class="title">Career growth how to <br>become a sought-after </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ========== SPEAKER & SCHEDULE END ========== -->

    <!--================= S-HAVE-PREPARED =================-->
    {{-- <section class="s-have-prepared counter-animate counter-active"
        style="background-image: url({{ asset('Ginger') }}/assets/img/bg-headway.jpg);">
        <div class="container">
            <h2 class="title-conference title-conference-white"><span>We have prepared</span></h2>
            <div class="row">
                <div class="col-6 col-sm-3 have-prepared-item">
                    <div class="have-prepared">
                        <img src="{{ asset('Ginger') }}/assets/img/tringle-blue.svg" alt="img">
                        <span data-number="128">0</span>
                        <h4>Successful projects</h4>
                    </div>
                </div>
                <div class="col-6 col-sm-3 have-prepared-item">
                    <div class="have-prepared">
                        <img src="{{ asset('Ginger') }}/assets/img/tringle-blue.svg" alt="img">
                        <span data-number="16">0</span>
                        <h4>Conferences per year</h4>
                    </div>
                </div>
                <div class="col-6 col-sm-3 have-prepared-item">
                    <div class="have-prepared">
                        <img src="{{ asset('Ginger') }}/assets/img/tringle-blue.svg" alt="img">
                        <span data-number="8">0</span>
                        <h4>Online courses</h4>
                    </div>
                </div>
                <div class="col-6 col-sm-3 have-prepared-item">
                    <div class="have-prepared">
                        <img src="{{ asset('Ginger') }}/assets/img/tringle-blue.svg" alt="img">
                        <span data-number="10">0</span>
                        <h4>Years in profession</h4>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--=============== S-HAVE-PREPARED END ===============-->

    <!--================= S-PRICING-TABLE =================-->
    <section class="s-pricing-table">
        <div class="container">
            <h2 class="title-conference"><span>Sponsorship</span></h2>
            <div class="row pricing-table-cover">
                <div class="col-md-4 pricing-table-col">
                    <div class="pricing-table-item">
                        <h3>Platinum</h3>
                        <div class="price-cover">
                            <span>Rp. </span>
                            <div class="price">20.000.000,-</div>
                            <img src="{{ asset('Ginger') }}/assets/img/tringle-price-yellow.svg" alt="img">
                        </div>
                        <div class="name">Gratis 3 undangan peserta</div>
                        {{-- <div class="price-text">Active Event</div> --}}
                        <ul class="price-list">
                            <li><i class="fas fa-check"></i>Logo akan dicantumkan pada promo event social media</li>
                            <li><i class="fas fa-check"></i>Dapat membagikan sampling produk dan flyers produk</li>
                            <li><i class="fas fa-check"></i>Dapat meletakan 1 rolled-upbanner/X-Banner di venue</li>
                        </ul>
                        <div>Lihat selengkapnya</div>
                        <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#platinum">
                            Detail
                        </button>
                    </div>
                </div>
                <div class="col-md-4 pricing-table-col">
                    <div class="pricing-table-item">
                        <h3>Crown</h3>
                        <div class="price-cover">
                            <span>Rp.</span>
                            <div class="price">30.000.000,-</div>
                            <img src="{{ asset('Ginger') }}/assets/img/tringle-price-yellow.svg" alt="img">
                        </div>
                        <div class="name">Gratis 5 undangan peserta</div>
                        {{-- <div class="price-text">Active Event</div> --}}
                        {{-- <span style="font-size: 24px; margin: auto; justify-content: center;">Online Campaign</span> --}}
                        <ul class="price-list">
                            <li><i class="fas fa-check"></i>Logo akan dicantumkan pada promo event social media</li>
                            <li><i class="fas fa-check"></i>Mendapatkan space booth di venue</li>
                            <li><i class="fas fa-check"></i>Dapat meletakan 4 rolled-upbanner/X-Banner di venue</li>
                        </ul>
                        <div>Lihat selengkapnya</div>
                        {{-- <button class="btn btn-yellow" data-toggle="modal">Detail</button> --}}
                        <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#crown">
                            Detail
                        </button>
                    </div>
                </div>
                <div class="col-md-4 pricing-table-col">
                    <div class="pricing-table-item">
                        <h3>Diamond</h3>
                        <div class="price-cover">
                            <span>Rp.</span>
                            <div class="price">25.000.000,-</div>
                            <img src="{{ asset('Ginger') }}/assets/img/tringle-price-yellow.svg" alt="img">
                        </div>
                        <div class="name">Gratis 4 undangan peserta</div>
                        {{-- <div class="price-text">Active Event</div> --}}
                        <ul class="price-list">
                            <li><i class="fas fa-check"></i>Logo akan dicantumkan pada promo event social media</li>
                            <li><i class="fas fa-check"></i>Mendapatkan space booth di venue</li>
                            <li><i class="fas fa-check"></i>Dapat meletakan 2 rolled-upbanner/X-Banner di venue</li>
                        </ul>
                        <div>Lihat selengkapnya</div>
                        <button type="button" class="btn btn-yellow" data-bs-toggle="modal" data-bs-target="#diamond">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="crown" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-1" id="exampleModalLabel" style="font-size: 2.5 rem;">Crown</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Gratis 5 undangan sebagai peserta</h4>
                    <h5>Rp. 30.000.000,-</h5>
                    <br>
                    <h5>Event Promotion</h5>
                    <ul>
                        <h6>Advertising/Online/Email Campaigns :</h6>
                        <li><i class="fa fa-check"></i> Logo akan dicantumkan di promo event baik via social media ikaubaya
                        </li>
                        <li><i class="fas fa-check"></i> Logo akan dicantumkan di promo event kepada seluruh alumni via
                            group whatsapp</li>
                        <li><i class="fas fa-check"></i> Logo akan dicantumkan di undangan yang akan ditujukan kepada Tamu
                            VIP</li>
                    </ul>
                    <br>
                    <h5>At the Event</h5>
                    <ul>
                        <h6>Complimentary :</h6>
                        <li><i class="fas fa-check"></i> Logo dicantumkan sebagai SPONSOR CROWN pada Welcome Banner,
                            Spanduk yang akan diletakan di pintu masuk Utama Venue</li>
                        <li><i class="fas fa-check"></i> Logo dicantumkan di Back Drop Panggung</li>
                        <li><i class="fas fa-check"></i> Mendapatkan space booth di venue</li>
                        <li><i class="fas fa-check"></i> Dapat membagikan sampling produk dan/atau membagikan flyers produk
                        </li>
                        <li><i class="fas fa-check"></i> Dapat meletakkan 4 (empat) rolled-upbanner/X-banner di venue</li>
                        <li><i class="fas fa-check"></i> Penyebutan nama sponsor oleh MC</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="diamond" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-1" id="exampleModalLabel" style="font-size: 2.5 rem;">Crown</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Gratis 4 undangan sebagai peserta</h4>
                    <h5>Rp. 25.000.000,-</h5>
                    <br>
                    <h5>Event Promotion</h5>
                    <ul>
                        <h6>Advertising/Online/Email Campaigns :</h6>
                        <li><i class="fa fa-check"></i> Logo akan dicantumkan di promo event baik via social media</li>
                        <li><i class="fas fa-check"></i> Logo akan dicantumkan di promo event kepada seluruh alumni via
                            group whatsapp</li>
                        <li><i class="fas fa-check"></i> Logo akan dicantumkan di undangan yang akan ditujukan kepada Tamu
                            VIP</li>
                    </ul>
                    <br>
                    <h5>At the Event</h5>
                    <ul>
                        <h6>Complimentary :</h6>
                        <li><i class="fas fa-check"></i> Logo dicantumkan sebagai SPONSOR DIAMOND pada Welcome Banner,
                            Spanduk yang akan diletakan di pintu masuk Utama Venue</li>
                        <li><i class="fas fa-check"></i> Logo dicantumkan di Back Drop Panggung sebagai SPONSOR DIAMOND
                        </li>
                        <li><i class="fas fa-check"></i> Mendapatkan space booth di venue</li>
                        <li><i class="fas fa-check"></i> Dapat membagikan sampling produk dan/atau membagikan flyers produk
                        </li>
                        <li><i class="fas fa-check"></i> Dapat meletakkan 2 (dua) rolled-upbanner/X-banner di venue</li>
                        <li><i class="fas fa-check"></i> Penyebutan nama sponsor oleh MC</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="platinum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-1" id="exampleModalLabel" style="font-size: 2.5 rem;">Crown</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Gratis 3 undangan sebagai peserta</h4>
                    <h5>Rp. 20.000.000,-</h5>
                    <br>
                    <h5>Event Promotion</h5>
                    <ul>
                        <h6>Advertising/Online/Email Campaigns :</h6>
                        <li><i class="fa fa-check"></i> Logo akan dicantumkan di promo event baik via social media</li>
                        <li><i class="fas fa-check"></i> Logo akan dicantumkan di promo event kepada seluruh alumni via
                            group whatsapp</li>
                        <li><i class="fas fa-check"></i> Logo akan dicantumkan di undangan yang akan ditujukan kepada Tamu
                            VIP</li>
                    </ul>
                    <br>
                    <h5>At the Event</h5>
                    <ul>
                        <h6>Complimentary :</h6>
                        <li><i class="fas fa-check"></i> Logo dicantumkan di Back Drop Panggung sebagai SPONSOR PLATINUM
                        </li>
                        <li><i class="fas fa-check"></i> Dapat membagikan sampling produk dan/atau membagikan flyers produk
                        </li>
                        <li><i class="fas fa-check"></i> Dapat meletakkan 1 (satu) rolled-upbanner/X-banner di venue</li>
                        <li><i class="fas fa-check"></i> Penyebutan nama sponsor oleh MC</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--=============== S-PRICING-TABLE END ===============-->


    <!--================== S-BUY-TICKET ==================-->
    {{-- <section id="register" class="s-buy-ticket">
        <div class="container">
            <h2 class="title-conference"><span>Buy ticket</span></h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="buy-ticket-left">
                        <h5>Od tempor incididunt ut labore et dolore magna</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed od tempor incididunt ut labore
                            et dolore magna aliqua.</p>
                        <div class="ticket-contact-cover">
                            <div class="ticket-contact-item">
                                <h5>Event organizer</h5>
                                <ul>
                                    <li><span>Name:</span>Eugene Scott</li>
                                    <li><span>Phone:</span><a href="tel:+343234345">+3 432 343 45</a></li>
                                    <li><span>Email:</span><a href="mailto:rovadex@gmail.com">rovadex@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ticket-contact-item">
                                <h5>Support</h5>
                                <ul>
                                    <li><span>Name:</span>Eugene Scott</li>
                                    <li><span>Phone:</span><a href="tel:+343234345">+3 432 343 45</a></li>
                                    <li><span>Email:</span><a href="mailto:rovadex@gmail.com">rovadex@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="buy-ticket-form">
                        <form id='contactform' action="{{ asset('Ginger') }}/assets/php/contact.php" name="contactform">
                            <h5>Information</h5>
                            <ul class="form-cover">
                                <li class="inp-cover inp-name"><input id="name" type="text" name="your-name"
                                        placeholder="Name"></li>
                                <li class="inp-cover inp-email"><input id="email" type="email" name="your-email"
                                        placeholder="E-mail"></li>
                                <li class="inp-cover inp-profession">
                                    <select class="nice-select">
                                        <option selected="selected" disabled>Profession</option>
                                        <option>Designer</option>
                                        <option>Developer</option>
                                        <option>QA</option>
                                    </select>
                                </li>
                                <li class="inp-cover inp-price">
                                    <select class="nice-select">
                                        <option selected="selected" disabled>Ticket Type</option>
                                        <option value="130$">Basic</option>
                                        <option value="140$">Ultimate</option>
                                        <option value="150$">Premium</option>
                                    </select>
                                </li>
                                <li class="pay-method">
                                    <h5>Payment method</h5>
                                    <div class="pay-item">
                                        <input type="radio" name="pay-1" checked value="credit card">
                                        <span></span>
                                        <p>credit card</p>
                                    </div>
                                    <div class="pay-item">
                                        <input type="radio" name="pay-1" value="payPal">
                                        <span></span>
                                        <p>payPal</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="checkbox-wrap">
                                <div class="checkbox-cover">
                                    <input type="checkbox">
                                    <p>By using this form you agree with the storage and handling of your data by this
                                        website.</p>
                                </div>
                            </div>
                            <div class="price-final">
                                <span>price:</span>
                                <div class="price-final-text">130$</div>
                            </div>
                            <div class="btn-form-cover">
                                <button id="#submit" type="submit" class="btn"><span>Buy now</span></button>
                            </div>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--================ S-BUY-TICKET END ================-->

    <!--================ CONFERENCE NEWS ================-->
    <section id="news" class="s-conference-news"
        style="background-image: url({{ asset('Ginger') }}/assets/img/background-s.svg);">
        <div class="conference-news-container">
            <h2 class="title-conference title-conference-white"><span>Galeri IKA</span></h2>
            <div class="conference-news-slider">
                {{-- {{ dd($results) }} --}}
                @foreach ($results as $result)
                    <div class="conference-news-slide">
                        <div class="conference-news-item">
                            <div class="conference-post-thumbnail">
                                <a href="{{ url('galeri', [$result->id]) }}"><img
                                        src="{{ asset('Ginger') }}/assets/img/{{ $result->image }}" alt="img"></a>
                            </div>
                            <div class="date"><span>{{ $result->date }}</span></div>
                            <div class="conference-post-content">
                                <h5><a href="{{ url('galeri', [$result->id]) }}">{{ $result->judul }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img src="{{ asset('Ginger') }}/assets/img/Donor Darah 2021.jpg"
                                    alt="img"></a>
                        </div>
                        <div class="date"><span>2021</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Donor Darah
                                </a></h4>
                        </div>
                    </div>
                </div>
                <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img src="{{ asset('Ginger') }}/assets/img/Baksos Covid 2020.jpg"
                                    alt="img"></a>
                        </div>
                        <div class="date"><span>2020</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Bakti Sosial Covid</a></h4>
                        </div>
                    </div>
                </div>
                <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img
                                    src="{{ asset('Ginger') }}/assets/img/Studium Generale 2022.jpeg" alt="img"></a>
                        </div>
                        <div class="date"><span>2022</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Studium Generale</a></h4>
                        </div>
                    </div>
                </div>
                <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img
                                    src="{{ asset('Ginger') }}/assets/img/Studi Ekskursi 2020.jpg" alt="img"></a>
                        </div>
                        <div class="date"><span>2020</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Studi Ekskursi</a></h4>
                        </div>
                    </div>
                </div>
                <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img
                                    src="{{ asset('Ginger') }}/assets/img/Rapat Umum Ang Baru 2021.jpg"
                                    alt="img"></a>
                        </div>
                        <div class="date"><span>2021</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Rapat Umum Anggota Baru</a></h4>
                        </div>
                    </div>
                </div>
                <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img src="{{ asset('Ginger') }}/assets/img/Raker IKA 2020.jpg"
                                    alt="img"></a>
                        </div>
                        <div class="date"><span>2020</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Raker IKA</a></h4>
                        </div>
                    </div>
                </div>
                <div class="conference-news-slide">
                    <div class="conference-news-item">
                        <div class="conference-post-thumbnail">
                            <a href="single-blog.html"><img
                                    src="{{ asset('Ginger') }}/assets/img/Pelantikan Pengurus IKA 2022.jpeg"
                                    alt="img"></a>
                        </div>
                        <div class="date"><span>2022</span></div>
                        <div class="conference-post-content">
                            <h4><a href="single-blog.html">Pelantikan Pengurus IKA</a></h4>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--============== CONFERENCE NEWS END ==============-->

    <!-- =============== CONFERENCE-MAP =============== -->
    {{-- <section id="location" class="conference-map">
        <div class="container">
            <h2 class="title-conference"><span>Our location</span></h2>
            <div class="row">
                <div class="col-lg-5 conference-map-info">
                    <ul class="mission-meta">
                        <li><i aria-hidden="true" class="fas fa-calendar-alt"></i>28.08.2019</li>
                        <li><i class="far fa-clock"></i>14:00 AM - 19:00 AM</li>
                    </ul>
                    <h3>New York Mark Plaza <span>3rd floor</span> Conference Hall</h3>
                    <div class="conference-map-content">
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores et quas </p>
                    </div>
                    <ul class="mission-meta">
                        <li><i aria-hidden="true" class="fas fa-map-marker-alt"></i>New York, Valley Stream</li>
                    </ul>
                </div>
                <div class="col-lg-7 conference-map-item">
                    <span>
                        <div id="map" class="cont-map google-map"></div>
                    </span>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ============= CONFERENCE-MAP END ============= -->

    <!--=================== S-CLIENTS ===================-->
    {{-- <section class="s-clients s-partners">
        <div class="container">
            <h2 class="title-conference"><span>Our partners</span></h2>
            <div class="clients-cover">
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="{{ asset('Ginger') }}/assets/img/client-1.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="{{ asset('Ginger') }}/assets/img/client-2.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="{{ asset('Ginger') }}/assets/img/client-4.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="{{ asset('Ginger') }}/assets/img/client-5.svg" alt="img">
                    </div>
                </div>
                <div class="client-slide">
                    <div class="client-slide-cover">
                        <img src="{{ asset('Ginger') }}/assets/img/client-6.svg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--================= S-CLIENTS END =================-->

    <!--================== S-INSTAGRAM ==================-->
    {{-- <section class="s-instagram">
        <div class="instagram-cover">
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">234 <i class="far fa-comment"></i></li>
                    <li class="like">134 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-1.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">222 <i class="far fa-comment"></i></li>
                    <li class="like">118 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-2.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">224 <i class="far fa-comment"></i></li>
                    <li class="like">124 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-3.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">155 <i class="far fa-comment"></i></li>
                    <li class="like">107 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-4.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">350 <i class="far fa-comment"></i></li>
                    <li class="like">140 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-5.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">350 <i class="far fa-comment"></i></li>
                    <li class="like">140 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-6.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">350 <i class="far fa-comment"></i></li>
                    <li class="like">140 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-7.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">350 <i class="far fa-comment"></i></li>
                    <li class="like">140 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-8.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">350 <i class="far fa-comment"></i></li>
                    <li class="like">140 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-9.jpg" alt="img">
            </a>
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">350 <i class="far fa-comment"></i></li>
                    <li class="like">140 <i class="far fa-heart"></i></li>
                </ul>
                <img class="rx-lazy" src="{{ asset('Ginger') }}/assets/img/placeholder-all.png"
                    data-src="{{ asset('Ginger') }}/assets/img/conference-insta-10.jpg" alt="img">
            </a>
        </div>
    </section> --}}
    <!--================ S-INSTAGRAM END ================-->

    <!--==================== FOOTER ====================-->
    <footer>
        <div class="container">
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
                            <a href="https://wa.me/+6281554971600" style="font-weight: 500; padding-left: 1px;">+62
                                812-9157-0084
                            </a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0079FF"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                            <a
                                style="color: black; font-weight: 500; padding-left: 5px; font-size: 22px;">ika.ubaya1976@gmail.com</a>
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
                                <a
                                    style="margin-top: 10px; color: black; font-weight: 500; padding-left: 10px; font-size: 20px; text-align:">Jl.
                                    Ngagel Jaya Selatan
                                    No.169, Pucang Sewu, Gubeng, Surabaya City, East
                                    Java 60284</a>
                            </div>

                        </li>
                    </ul>


                    <h3 style="margin-top: 10px;">Social</h3>
                    <ul class="footer-list social-footer-ins">
                        <li><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0079FF"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg><a target="_blank" href="https://www.facebook.com/ika.ubaya.9"
                                style="padding-left: 5px;">IKA UBAYA</a></li>

                        <li><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0079FF"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg><a target="_blank" href="https://www.instagram.com/ikaubaya/"
                                style="padding-left: 5px;">Instagram</a></li>
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
@endsection
