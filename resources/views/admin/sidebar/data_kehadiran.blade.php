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
                <h5 class="m-0 font-weight-bold text-primary">Table Transaksi</h5>
                <br>
                <h5>Download Data Waktu Tertentu</h5>
                <label for="start_date">Start</label>
                <input type="datetime-local" class="form-control" name="start-time" id="start_date">
                <label for="end_date">End</label>
                <input type="datetime-local" class="form-control" name="end-time" id="end_date">
                <button type="button" class="btn btn-primary" id="time-download" onclick="downloaddatawaktu()">Download berdasar Waktu</button>
                <hr>
                <h5>Download Seluruh Data</h5>
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
                                <th>Check in Time</th>


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tx_id</th>
                                <th>Nama Lengkap</th>
                                <th>Is_checkin</th>
                                <th>Is_merch</th>
                                <th>Check in Time</th>

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
                                    <td>{{ $result->check_in_time }}</td>
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
@section('script')
<script>
    function downloaddatawaktu(){
        let start = $("#start_date").val();
        let end = $("#end_date").val();
        var query = {
            pstart: $('#start_date').val(),
            pend: $('#end_date').val(),
            // booth: $('#booth').val()
        }

        var url = "{{URL::to('admin/downloaddatatime')}}?" + $.param(query)

        window.location = url;
        // $.ajax({
        //         type: 'GET',
        //         success: function(data) {
        //             console.log(data);
        //             if(data.status == "oke") {
        //                 $('#buttonresend-'+id).addClass('btn-secondary').removeClass('btn-primary');
        //             }
        //             $('#modalcontent').html(data.msg)
        //         }
        //     });
    }
</script>
@endsection
