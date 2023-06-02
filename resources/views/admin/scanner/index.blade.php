@extends('admin.template.dashboard')

@section('title')
    Scanner
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/custom-nvn.css') }}">

    <style>
        #pageloader {
            background: rgba(255, 255, 255, 0.8);
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        #pageloader img {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }
    </style>
    <script src="{{ asset('js/instascan.min.js') }}"></script>
@endsection

@section('sidebar')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        {{-- <li class="nav-item active">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div> --}}

        <!-- Nav Item - Pages Collapse Menu -->
        {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>All Data</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Kehadiran</span>
        </a>
    </li> --}}

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Peserta</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="/admin">All Data</a>
                    <a class="collapse-item" href="/admin/lunas_manual">Lunas/Manual</a>
                    <a class="collapse-item" href="/admin/add-data-manual">Input Manual</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/data_kehadiran">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Kehadiran</span>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/scanner">
                <i class="fas fa-fw fa-list"></i>
                <span>Scanner</span>
            </a>
        </li>
        <li class="nav-item">
            <div class="text-center">
                <form action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <input type="submit" value="Logout" class="btn btn-danger" style="width: 70%;">
                </form>
            </div>
        </li>

    </ul>
@endsection



@section('content')
    <div id="pageloader">
        <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
    </div>
    <audio id="myAudio">
        <source src="{{asset('sound/Correct Answer Sound Effect.mp3')}}" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Scanner</h1>
        </div>

        <!-- Content Row -->


        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-lg-6">
                <div class="jumbotron text-center">
                    ID Transaksi: <h3 id="showinfo"> </h3>
                    <p>
                        <video id="preview" class="camera-rwd"></video>
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                        </label>

                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="response_scan"></div>
            </div>
            <!-- Pie Chart -->

        </div>

        <!-- Content Row -->


    </div>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        var x = document.getElementById("myAudio");

        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            mirror: false
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
            $("#showinfo").html(content);
            showDetailMhs(content);

        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                // alert(cameras);
                scanner.start(cameras[0]);
                $('[name="options"]').on('change', function() {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    } else if ($(this).val() == 2) {
                        if (cameras[1] != "") {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No Back camera found!');
                        }
                    }
                });
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
            alert(e);
        });

        function checkInClick() {
            $("#pageloader").fadeIn();
            x.play();
            var idtx = $("#idtiket").val();
            var attend = 0;
            var merch = 0;
            if ($('input#attend').is(':checked')) {
                attend = 1;
            }
            if ($('input#merch').is(':checked')) {
                merch = 1;
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('scanner.changeStatus') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    id: idtx,
                    attend: attend,
                    merch: merch
                },
                success: function(data) {
                    $("#pageloader").fadeOut();
                    if (data.status != 'oke') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data tidak ditemukan di database!'
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'yeyyy!',
                            text: 'Data sukses tersimpan!'
                        });
                        $('#response_scan').html(data.msg)
                    }

                }
            });
        }

        function showDetailMhs(idtx) {
            var str = "kosong;";
            $.ajax({
                type: 'POST',
                url: "{{ route('scanner.getDetailData') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    id: idtx
                },
                success: function(data) {
                    if (data.status != 'oke') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data tidak ditemukan di database!'
                        });
                    } else {
                        x.play();
                        Swal.fire({
                            icon: 'success',
                            title: 'Hai!',
                            text: data.nama + '!'
                        });
                        $('#response_scan').html(data.msg)
                    }
                }

            });
        }
    </script>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
@endsection
