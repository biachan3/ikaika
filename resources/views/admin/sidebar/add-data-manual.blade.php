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
                    <a class="collapse-item" href="/admin/lunas_manual">Lunas/Manual</a>
                    <a class="collapse-item active" href="/admin/add-data-manual">Input Manual</a>
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
        <div class="col-md-12">

                    @if (session('status'))

                    <div role="alert" class="alert alert-success">{{session('status')}}</div>

                    @elseif (session('error'))

                    <div role="alert" class="alert alert-danger">{{session('error')}}</div>

                    @endif

                </div>
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Input Data Manual</h5>
                <br>

            </div>
            <div class="card-body">

                <form action="{{ route('postadddatamanual') }}" method="post" target="_blank"
                    enctype="multipart/form-data">
                    @csrf
                    <select class="" name="fakultas">
                        <option selected="selected" disabled>&nbsp; &nbsp; &nbsp; Alumni Fakultas</option>
                        <option value="farmasi">&nbsp; &nbsp; &nbsp; Farmasi</option>
                        <option value="hukum">&nbsp; &nbsp; &nbsp; Hukum</option>
                        <option value="fbe">&nbsp; &nbsp; &nbsp; Bisnis Ekonomi</option>
                        <option value="politeknik">&nbsp; &nbsp; &nbsp; Politeknik</option>
                        <option value="psikologi">&nbsp; &nbsp; &nbsp; Psikologi</option>
                        <option value="teknik">&nbsp; &nbsp; &nbsp; Teknik</option>
                        <option value="industri">&nbsp; &nbsp; &nbsp; Industri Kreatif</option>
                        <option value="teknobiologi">&nbsp; &nbsp; &nbsp; Teknobiologi</option>
                        <option value="kedokteran">&nbsp; &nbsp; &nbsp; Kedokteran</option>
                    </select>
                    <br>
                    <label for="">Nama : </label>
                    <input type="text" name="nama" id="">
                    <br>
                    <label for="">Nomer Telpon : </label>
                    <input type="text" name="no_hp" id="">
                    <br>
                    <label for="">angkatan : </label>
                    <input type="text" name="angakatan" id="">
                    <br>
                    {{-- <input type="file" name="file" id=""> --}}
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
