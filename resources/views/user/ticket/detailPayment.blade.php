@if ($obj_response->error_code != "0000")
<div class="row">
    <div class="col-12">
        <p style="color:red;"><b>Kode Error : {{$obj_response->error_code}}</b></p>
        <p style="color:red;"><b>Pesan Error : {{$obj_response->error_message}}</b></p>
    </div>
</div>
@else
    @if ($data->transaction_status != "Sukses" && $data->transaction_status != "Sukses - Manual")
    <div class="row">
        <div class="col-12">
            @if ($method == "qris")
                <p>Total Nominal : {{$total_amount_tx}}</p>
                <small>Rp. {{$data->amount + $data->amount_donasi}} + Biaya Penanganan Rp. {{$fee}}</small>
                @if ($data->transaction_status != "Sukses" && $data->transaction_status != "Sukses - Manual")
                <div class="row justify-content-center">
                    <div class="col-8" style="text-align: center">
                        <h5>Silahkan melakukan pembayaran pada QRIS berikut :</h5>
                        <p>
                            <img src="https://pulsapaket.com/images/blog/iconQris.png" style="max-width:80%" alt="">
                            <br>
                            <img src="{{$data->payment_media}}" style="max-width:90%" alt="">
                        </p>
                    </div>
                </div>
                <small>Harap segera melakukan pembayaran sebelum : <b>{{$data->payment_expiry_time}}</b></small>
                @endif
            @else
                <p>Total Nominal : {{$total_amount_tx}}</p>
                <small>Rp. {{$data->amount + $data->amount_donasi}} + Biaya Penanganan Rp. {{$fee}}</small>
                <h5>Virtual Account :</h5>
                <p>
                    <b>{{$data->payment_media}}</b>
                </p>
                <small>Harap segera melakukan pembayaran sebelum : <b>{{$data->payment_expiry_time}}</b></small>
            @endif
            <p>Status Pembayaran : {{$data->transaction_status}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h6>Silahkan refresh/muat ulang halaman ini untuk memperbaharui status pembayaran anda.</h6>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">

        </div>
    </div>
    @endif
@endif

