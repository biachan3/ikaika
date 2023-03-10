<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material-kit-master') }}/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('material-kit-master') }}/assets/img/favicon.png" />
    <title>Material Kit 2 by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('material-kit-master') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('material-kit-master') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material-kit-master') }}/assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="sign-in-basic">
    <!-- Navbar Transparent -->

    <!-- End Navbar -->
    <div class="page-header align-items-start min-vh-100"
        style="
        background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');
      "
        loading="lazy">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                    Sign in
                                </h4>
                            </div>
                        </div>
                        <x-auth-validation-errors class="" :errors="$errors" />
                        <div class="card-body">
                            <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input id="email" class="form-control block mt-1 w-full" type="email" name="email" required
                                    autofocus/>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="namaLengkap">Nama Lengkap Alumni</label>
                                    <input id="namaLengkap" class="form-control block mt-1 w-full" type="" name="namaLengkap" required
                                    autofocus/>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="alamatDomisili">Alamat Domisili</label>
                                    <input id="alamatDomisili" class="form-control block mt-1 w-full" type="" name="alamatDomisili" required
                                    autofocus/>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="kota">Kota</label>
                                    <input id="kota" class="form-control block mt-1 w-full" type="" name="kota" required
                                    autofocus/>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="provinsi">Provinsi</label>
                                    <input id="provinsi" class="form-control block mt-1 w-full" type="" name="provinsi" required
                                    autofocus/>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="nomorTelp">No. Handphone Aktif</label>
                                    <input id="nomorTelp" class="form-control block mt-1 w-full" type="" name="nomorTelp" required
                                    autofocus/>
                                </div>

                                //Drop Down
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="nomorTelp">No. Handphone Aktif</label>
                                    <input id="nomorTelp" class="form-control block mt-1 w-full" type="" name="nomorTelp" required
                                    autofocus/>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label" for="tahunAngkatan">Tahun Angkatan (Masuk UBAYA)</label>
                                    <input id="tahunAngkatan" class="form-control block mt-1 w-full" type="number" name="tahunAngkatan" required
                                    />
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                        Sign in
                                    </button>
                                </div>
                                {{-- <button class="w-200 mt-3 ml-3"> --}}
                                    <a href="/register" class=" ">
                                        <p class="mt-4 text-sm text-center">Don't have an account?</p>
                                    </a>
                                {{-- </button> --}}
                                {{-- <p class="mt-4 text-sm text-center">Don't have an account?</p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold text-white"
                                target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-white"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-white"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-white"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('material-kit-master') }}/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('material-kit-master') }}/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('material-kit-master') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="{{ asset('material-kit-master') }}/assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('material-kit-master') }}/assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
</body>

</html>
