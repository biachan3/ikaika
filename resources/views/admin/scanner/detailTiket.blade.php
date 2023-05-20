@if ($data->transaction_status == "Sukses")
<div>
    <div id="detaildata">
        <p>Nama Lengkap : {{$data->nama_lengkap}}</p>
        <p>Alumni Fakultas : {{$data->fakultas}}</p>
        <p>Angkatan : {{$data->angkatan}}</p>
        <hr>
        <p>Status Bayar : {{$data->transaction_status}}</p>
        <p>Tanggal Bayar : {{$data->payment_datetime}}</p>
        <p>Status Kehadiran : @if($data->is_check_in == 1)✅@else ❌ @endif</p>
        <p>Status Ambil Merch : @if($data->is_take_merch == 1)✅@else ❌ @endif</p>
    </div>
    <hr>
    <div>

        <input type="checkbox" name="attend" class="form-control" id="attend" value="attend" checked><label for="attend">Kehadiran</label>
        <input type="checkbox" name="merch" class="form-control" id="merch" value="merch" checked><label for="merch">Merchandise</label>
        <br>
        <input type="hidden" name="idtiket" id="idtiket"value="{{$data->id}}">
        <button class="btn btn-sm btn-primary shadow-sm" onclick="checkInClick()"><i class="fas fa-check fa-sm text-white-50"></i> Check-In</button>
    </div>
</div>

@else

<div>
    <h1>BELUM BAYAR!</h1>
</div>

@endif
