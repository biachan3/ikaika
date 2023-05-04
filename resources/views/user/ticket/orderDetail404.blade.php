@extends('template.dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('css/custom-nvn.css')}}">
@endsection
@section('content')
<section id="register" class="s-buy-ticket" style="padding:148px 148px; ">
    <div class="">
        <h2 class="title-conference"><span>Detail Transaksi</span></h2>
        <div class="card-orderd justify-content-center">
            <div class="col-md-6" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:20px 20px; border-radius:20px; margin-bottom:20px;">
                <div class="buy-ticket-form">
                    <p>ID Transaksi : {{$id}}</p>
                    <hr>
                    <h4>Data Tidak Ditemukan</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
</script>
@endsection
