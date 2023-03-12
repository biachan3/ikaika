@extends('template.dashboard')
@section('content')
<section id="register" class="s-buy-ticket" style="padding:148px 148px; ">
    <div class="">
        <h2 class="title-conference"><span>Detail Transaksi</span></h2>
        <div class="row justify-content-center">
            <div class="col-md-6" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:20px 20px; border-radius:20px; margin-bottom:20px;">
                <div class="buy-ticket-form">
                    <i>Kode Transaksi : {{$detail_tx->id}}</i>
                    @if ($detail_tx->payment_method == null)
                    <form id='contactform' action="{{route('regis')}}" method="POST">
                        @csrf
                        <h5>Data Pembayaran</h5>
                        <ul class="form-cover">
                            <li class="inp-cover inp-profession">
                                <select class="nice-select" id="payment_method" name="method" onchange="getValueMethod()">
                                    <option selected="selected" disabled>Metode Pembayaran</option>
                                    <option value="bca_va">BCA Virtual Account</option>
                                    <option value="bni_va">BNI Virtual Account</option>
                                    <option value="bri_va">BRI Virtual Account</option>
                                    <option value="mandiri_va">Manidiri Bill Payment</option>
                                    <option value="permata_va">Permata Virtual Account</option>
                                </select>
                            </li>
                        </ul>
                    </form>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div id="response_payment">

                            </div>
                        </div>
                    </div>

                    @else

                    <div class="row">
                        <div class="col-12 text-center">
                            <div id="response_payment">
                                <div class="row">
                                    <div class="col-12">
                                        <p>Total Nominal : {{$detail_tx->gross_amount}}</p>
                                        <small>Rp. {{$detail_tx->amount + $detail_tx->amount_donasi}} + Biaya Penanganan Rp. {{ $detail_tx->gross_amount - ($detail_tx->amount + $detail_tx->amount_donasi)}}</small>
                                        <br><br>
                                        <h5>Virtual Account :</h5>
                                        <p>
                                            <b>{{$detail_tx->payment_media}}</b>
                                        </p>
                                        <p>Status Pembayaran :
                                            @if ($detail_tx->status == "settlement")
                                                Sukses
                                            @else
                                                {{$detail_tx->status}}
                                            @endif

                                        </p>
                                        <br>
                                        <small>ID Transaksi : {{$detail_tx->midtrans_tx_id}}</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Silahkan refresh/muat ulang halaman ini untuk memperbaharui status pembayaran anda.</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var nominal = 0;
function getValueMethod(){

    method = $('#payment_method').val();
    console.log(method);
    $('#response_payment').html(`<div class="loader"></div>`);
    $.ajax({
        type:'POST',
        url:'{{route("getVirtualAccount")}}',
        data:{
            '_token':'<?php echo csrf_token() ?>',
            id: "{{$detail_tx->id}}",
            method: method
        },
        success: function(data){
            // $('#response_payment').clear();
            $('#response_payment').html(data.msg)
        }
    });

    // $("#final_price").text("Rp. " + nominal.toLocaleString());
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>
@endsection
