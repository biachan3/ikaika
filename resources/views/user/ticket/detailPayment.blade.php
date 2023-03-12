<div class="row">
    <div class="col-12">
        @if ($method != "mandiri_va")
            <h5>Virtual Account :</h5>
            <p>
                <b>{{$data->payment_media}}</b>
            </p>
            <small>Harap segera melakukan pembayaran sebelum : <b>{{$data->payment_expiry_time}}</b></small>
        @else
            <h5>Biller Code :</h5>
            <p>
                70012
            </p>
            <h5>Biller Key :</h5>
            <p>
                123456789
            </p>
        @endif
        <p>Status Pembayaran : {{$data->status}}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <h6>Silahkan refresh/muat ulang halaman ini untuk memperbaharui status pembayaran anda.</h6>
    </div>
</div>
