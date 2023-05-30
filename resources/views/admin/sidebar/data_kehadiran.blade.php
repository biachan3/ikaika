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
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Peserta</span>
            </a>
            <div id="collapseUtilities" class="collapse active" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item" href="/admin">All Data</a>
                    <a class="collapse-item" href="/admin/lunas_manual">Lunas/Manual</a>
                    <a class="collapse-item" href="/admin/add-data-manual">Input Manual</a>
                </div>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/data_kehadiran">
                <i class="fas fa-fw fa-list"></i>
                <span>Data Kehadiran</span>
            </a>
        </li>

    </ul>
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Table Transaksi</h5>
                <br>
                <a href="{{ route('admin.exportTicket') }}" class="btn btn-primary">Download Data</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tx_id</th>
                                <th>Nama Lengkap</th>
                                <th>Is_checkin</th>
                                <th>Is_merch</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tx_id</th>
                                <th>Nama Lengkap</th>
                                <th>Is_checkin</th>
                                <th>Is_merch</th>

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
                                    @if ($result->is_check_in == 1)
                                        <td>✅</td>
                                    @else
                                        <td>❌</td>
                                    @endif
                                    @if ($result->is_take_merch == 1)
                                        <td>✅</td>
                                    @else
                                        <td>❌</td>
                                    @endif

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
@endsection
