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

                    <a class="collapse-item" href="/admin">All Data</a>
                    <a class="collapse-item active" href="/admin/lunas_manual">Lunas/Manual</a>
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


    </ul>
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col-md-12">
                    @if (session('status'))
                    <div role="alert" class="alert alert-success">{{session('status')}}</div>
                    @elseif (session('error'))
                    <div role="alert" class="alert alert-danger">{{session('error')}}</div>
                    @endif
                </div>
                <h5 class="m-0 font-weight-bold text-primary">Table Transaksi</h5>
                <br>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Handphone</th>
                                <th>Fakultas</th>
                                <th>Angkatan</th>
                                <th>Payment Ref</th>
                                <th>Payment Time</th>
                                <th>Metode Bayar</th>
                                <th>Download</th>
                                <th>Edit</th>
                                <th>Resend WA</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Handphone</th>
                                <th>Fakultas</th>
                                <th>Angkatan</th>
                                <th>Payment Ref</th>
                                <th>Payment Time</th>
                                <th>Metode Bayar</th>
                                <th>Download</th>
                                <th>Edit</th>
                                <th>Resend WA</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{ dd($jum_tx) }} --}}
                            @php
                                $angka = 1;
                            @endphp
                            @foreach ($results as $result)
                                @if ($result->transaction_status == 'Sukses - Manual')
                                    <tr style="background-color:#fbff7f;color:#000000;">
                                        <td>{{ $angka }}</td>
                                        <td>{{ $result->nama_lengkap }}</td>
                                        <td>{{ $result->no_hp }}</td>
                                        <td>{{ $result->fakultas }}</td>
                                        <td>{{ $result->angkatan }}</td>
                                        <td>{{ $result->payment_ref }}</td>
                                        <td>{{ $result->payment_datetime }}</td>
                                        <td>{{ $result->payment_method }}</td>
                                        <td>
                                            <a target='_blank' href="{{url("/public/public/pdf/"."Ticket-$result->id.pdf")}}" class="btn btn-info">Download</a>
                                        </td>
                                        <td>
                                            <button type="button" onclick="editdata('{{ $result->id }}')"
                                                class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                                Edit
                                            </button>
                                        </td>
                                        @if ($result->wa_sent == 1)
                                            <td>
                                                <button type="button" onclick="resendwa('{{ $result->id }}')"
                                                    class="btn btn-secondary" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Resend WA
                                                </button>
                                            </td>
                                        @else
                                            <td>
                                                <button type="button" onclick="resendwa('{{ $result->id }}')"
                                                    class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonresend-{{$result->id}}">
                                                    Resend WA
                                                </button>
                                            </td>
                                        @endif

                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $angka }}</td>
                                        <td>{{ $result->nama_lengkap }}</td>
                                        <td>{{ $result->no_hp }}</td>
                                        <td>{{ $result->fakultas }}</td>
                                        <td>{{ $result->angkatan }}</td>
                                        <td>{{ $result->payment_ref }}</td>
                                        <td>{{ $result->payment_datetime }}</td>
                                        <td>{{ $result->payment_method }}</td>
                                        <td>
                                            <a target='_blank' href="{{url("/public/public/pdf/"."Ticket-$result->id.pdf")}}" class="btn btn-info">Download</a>
                                        </td>
                                        <td>
                                            <button type="button" onclick="editdata('{{ $result->id }}')"
                                                class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                                Edit
                                            </button>
                                        </td>
                                        <td>-</td>
                                    </tr>
                                @endif
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
    <script>
        function resendwa(id) {
            $('#modalcontent').html(`<div class="loader"></div>`);

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.resendwa') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    if(data.status == "oke") {
                        $('#buttonresend-'+id).addClass('btn-secondary').removeClass('btn-primary');
                    }
                    $('#modalcontent').html(data.msg)
                }
            });

        }

        function editdata(id) {
            $('#modalcontent').html(`<div class="loader"></div>`);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.editdata') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    id: id
                },
                success: function(data) {
                    // if(data.status == "oke") {
                    //     $('#buttonresend-'+id).addClass('btn-secondary').removeClass('btn-primary');
                    // }
                    $('#modalcontent').html(data.msg)
                }
            });
        }
    </script>
@endsection
