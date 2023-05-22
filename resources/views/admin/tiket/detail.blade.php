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

@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id Tiket</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Fakultas</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id Tiket</th>
                                <th>Nama</th>
                                <th>Angkatan</th>
                                <th>Fakultas</th>
                                <th>Aksi</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{ dd($ticket) }} --}}
                            {{-- @foreach ($ticket as $result) --}}
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->event_id }}</td>
                                <td>{{ $ticket->bank_id }}</td>
                                <td>{{ $ticket->amount }}</td>

                            </tr>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('admin.index') }}" class="btn block btn-xs btn-info">Back</a>
            </div>
        </div>
    </div>
@endsection
