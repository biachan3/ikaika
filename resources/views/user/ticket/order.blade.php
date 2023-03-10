@extends('template.dashboard')
@section('content')
<section id="register" class="s-marathon-register" style="padding-top:148px; ">
    <div class="">
        <h2 class="title-conference"><span>Beli Tiket</span></h2>
        <div class="row justify-content-center">
            <div class="col-md-6" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:20px 20px; border-radius:20px; margin-bottom:20px;">
                <div class="buy-ticket-form">
                    <form id='contactform' action="{{route('regis')}}" method="POST">
                        @csrf
                        <h5>Data Diri</h5>
                        <ul class="form-cover">
                            <li class="inp-cover inp-name"><input id="name" type="text" name="nama" placeholder="Nama Lengkap" required></li>
                            <li class="inp-cover inp-email"><input id="email" type="email" name="email" placeholder="E-mail" required></li>
                            <li class="inp-cover inp-name"><input id="alamat" type="text" name="alamat" placeholder="Alamat Domisili" required></li>
                            <li class="inp-cover inp-name"><input id="kota" type="text" name="provinsi" placeholder="Provinsi" required></li>
                            <li class="inp-cover inp-name"><input id="no_hp" type="text" name="no_hp" placeholder="Nomor HP" required></li>
                            <li class="inp-cover inp-profession">
                                <select class="nice-select">
                                    <option selected="selected" disabled>Alumni Fakultas</option>
                                    <option>Farmasi</option>
                                    <option>Hukum</option>
                                    <option>Bisnis Ekonomi</option>
                                    <option>Politeknik</option>
                                    <option>Psikologi</option>
                                    <option>Teknik</option>
                                    <option>Teknobiologi</option>
                                    <option>Kedokteran</option>
                                </select>
                            </li>
                            <li class="pay-method">
                                <h5>Dengan donasi</h5>
                                <div class="pay-item">
                                    <input type="radio" name="pay-1" checked value="Ya">
                                    <span></span>
                                    <p>Ya</p>
                                </div>
                                <div>
                                    <input id="nominal" type="text" name="nominal" placeholder="Nominal" onkeypress="return isNumber(event)" onkeyup="getamount(event)">
                                </div>
                                <br>
                                <div class="pay-item">
                                    <input type="radio" name="pay-1" value="Tidak">
                                    <span></span>
                                    <p>Tidak</p>
                                </div>
                            </li>
                            <li class="inp-cover inp-name"></li>
                        </ul>
                        <div class="checkbox-wrap">
                            <div class="checkbox-cover">
                                <input type="checkbox">
                                <p>By using this form you agree with the storage and handling of your data by this
                                    website.</p>
                            </div>
                        </div>
                        <div class="price-final">
                            <span>price:</span>
                            <div class="price-final-text" id="final_price">Rp. 100000</div>
                        </div>
                        <div class="btn-form-cover">
                            <button type="submit" class="btn"><span>Buy now</span></button>
                        </div>
                    </form>
                    <div id="message"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var nominal = 0;
function getamount(evt){

    nominal = parseInt($('#nominal').val()) + 100000;
    $("#final_price").text("Rp. " + nominal.toLocaleString());
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
