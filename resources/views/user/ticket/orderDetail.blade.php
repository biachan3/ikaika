@extends('template.dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('css/custom-nvn.css')}}">
@endsection
@section('content')
@if ($detail_tx->payment_method == null)
<script>

    alert("Harap pastikan pilihan metode pembayaran anda! Anda tidak dapat mengubah metode pembayaran kecuali melakukan registrasi ulang!");
</script>
@endif

<section id="register" class="s-buy-ticket" style="padding:148px 148px; ">
    <div class="">
        <h2 class="title-conference"><span>Detail Transaksi</span></h2>
        <div class="card-orderd justify-content-center">
            <div class="col-md-6" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 15px 15px 20px 15px; border-radius:20px; margin-bottom:20px;">
                <div class="buy-ticket-form">
                    <i>Kode Transaksi : {{$detail_tx->id}}</i>
                    @if ($detail_tx->payment_method == null && $detail_tx->transaction_status != "Sukses - Manual")
                    <form id='contactform' action="{{route('regis')}}" method="POST">
                        @csrf
                        <h5>Data Pembayaran</h5>
                        <ul class="form-cover">
                            <li class="inp-cover inp-profession">
                                <select class="nice-select" id="payment_method" name="method" onchange="getValueMethod()">
                                    <option selected="selected" disabled>Metode Pembayaran</option>
                                    <option value="qris">QRIS</option>
                                    <option value="009">BNI Virtual Account</option>
                                    <option value="002">BRI Virtual Account</option>
                                    <option value="008">Mandiri Virtual Account</option>
                                    <option value="013">Permata Virtual Account</option>
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
                            <div id="">
                                <div class="row">
                                    <div class="col-12">
                                        <p>Total Nominal : {{$detail_tx->gross_amount}}</p>
                                        <small>Rp. {{$detail_tx->amount + $detail_tx->amount_donasi}} + Biaya Penanganan Rp. {{ $detail_tx->gross_amount - ($detail_tx->amount + $detail_tx->amount_donasi)}}</small>
                                        <br><br>
                                        @if ($detail_tx->payment_method != "QRIS")
                                        <h5>Virtual Account :</h5>
                                        <p>
                                            <b>{{$detail_tx->payment_media}}</b>
                                        </p>
                                        @else
                                            @if ($detail_tx->transaction_status != "Sukses")
                                                <div class="row justify-content-center">
                                                    <div class="col-8" style="text-align: center">
                                                        <h5>Silahkan melakukan pembayaran pada QRIS berikut :</h5>
                                                        <p>
                                                            <img src="https://pulsapaket.com/images/blog/iconQris.png" style="max-width:80%" alt="">
                                                            <br>
                                                            <img src="{{$detail_tx->payment_media}}" style="max-width:90%" alt="">
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif

                                        @endif
                                        <p>Status Pembayaran :
                                            @if ($detail_tx->transaction_status == "settlement")
                                                Sukses
                                            @else
                                                {{$detail_tx->transaction_status}}
                                            @endif
                                        </p>
                                        <hr>
                                        @if($detail_tx->transaction_status == "Sukses - Manual" || $detail_tx->transaction_status == "Sukses")
                                        <p>
                                            <b>
                                                Terima kasih Anda telah terdaftar sebagai peserta Reuni Akbar IKA Ubaya 2023. Undangan Elektronik akan kami kirimkan ke email atau nomor wa Anda yang terdaftar dalam waktu 2x24jam 🙏🏻
                                            </b>
                                        </p>
                                        <p>Silahkan simpan QR Code dibawah ini untuk registrasi pada saat acara: </p>
                                        {!! $qrcode !!}
                                        @endif
                                        <br>
                                        <small>ID Transaksi : {{$detail_tx->uuid}}</small>
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
    $('.nice-select').eq(1).addClass('disabled');
    // console.log($('.nice-select')[1]);
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
}
</script>
@endsection
