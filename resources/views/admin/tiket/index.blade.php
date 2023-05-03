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
                <h5 class="m-0 font-weight-bold text-primary">Table Transaksi</h5>
                <br>
                <h6>Banyaknya Transaksi: {{ $jum_tx }}</h6>
                <h6>Sudah Lunas: {{ $jum_sdh }} transaksi dengan total uang sebesar: Rp.
                    {{ number_format($uang_lunas) }}</h6>
                <h6>Belum Lunas: {{ $jum_blm }} transaksi dengan total uang sebesar: Rp. {{ number_format($uang_blm) }}
                </h6>
            </div>
            <div class="card-body">
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
