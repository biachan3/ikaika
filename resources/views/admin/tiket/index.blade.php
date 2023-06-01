@extends('admin.template.dashboard')
@section('style')
    <style>
        .block {
            display: block;
            width: 100%;
            border: none;
            /* background-color: #04AA6D; */
            /* padding: 14px 28px; */
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/custom-nvn.css') }}">
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
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Peserta</span>
            </a>
            <div id="collapseUtilities" class="collapse active" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item active" href="/admin">All Data</a>
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
        <li class="nav-item">
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

        {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Data Kehadiran</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div> --}}

    </ul>
@endsection

@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Table Transaksi</h5>
                <br>
                <h6>Banyaknya Transaksi: {{ $jum_tx }}</h6>
                <h6>Sudah Lunas: {{ $jum_sdh }} transaksi dengan total uang sebesar: Rp.
                    {{ number_format($uang_lunas) }}</h6>
                <h6>Belum Lunas: {{ $jum_blm }} transaksi dengan total uang sebesar: Rp. {{ number_format($uang_blm) }}
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> WA Terkirim
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Belum Terkirim WA
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Tiket</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Handphone</th>
                                <th>Harga Tiket</th>
                                <th>Nominal Donasi</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Resend WA</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Tiket</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Handphone</th>
                                <th>Harga Tiket</th>
                                <th>Nominal Donasi</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Resend WA</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{ dd($jum_tx) }} --}}
                            @php
                                $angka = 1;
                            @endphp
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $angka }}</td>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->nama_lengkap }}</td>
                                    <td>{{ $result->no_hp }}</td>
                                    <td>{{ $result->amount }}</td>
                                    <td>{{ $result->amount_donasi }}</td>
                                    <td>{{ $result->gross_amount }}</td>
                                    @if ($result->transaction_status == null)
                                        <td>Terbentuk</td>
                                    @else
                                        <td>{{ $result->transaction_status }}</td>
                                    @endif
                                    <td> <a href="{{ route('admin.detail', [$result->id]) }}"
                                            class="btn block btn-xs btn-info">Detail</a></td>
                                    <td><button type="button" onclick="resendwa('{{ $result->id }}')"
                                            class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Resend WA
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $angka++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalcontent">
                    <div class="loader"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>
        // Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        // Chart.defaults.global.defaultFontColor = '#858796';

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Sukses", "Belum"],
            datasets: [{
            data: [{{$manual_sukses_wa}}, {{$manual_not_wa}}],
            backgroundColor: ['#4e73df', '#1cc88a'],
            hoverBackgroundColor: ['#2e59d9', '#17a673'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
        });
        function resendwa(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.resendwa') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#modalcontent').html(data.msg)
                }
            });

        }
    </script>
@endsection
