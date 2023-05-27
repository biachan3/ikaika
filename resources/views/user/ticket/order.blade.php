@extends('template.dashboard')

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .form-register {
            position: relative;
            z-index: 5;
        }

        #pageloader
        {
            background: rgba( 255, 255, 255, 0.8 );
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }

        #pageloader img
        {
            left: 50%;
            margin-left: -32px;
            margin-top: -32px;
            position: absolute;
            top: 50%;
        }


        option {
            line-height: 9px;
            font-size: 20px;

        }

        select {
            width: 100%;
        }
    </style>
@endsection

@section('content')

<div id="pageloader">
   <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
</div>

    <section id="register" class="s-marathon-register" style="padding-top:148px; ">
        <div class="">
            <h2 class="title-conference"><span>Beli Tiket</span></h2>
            <div class="row justify-content-center">
                <div class="col-md-6"
                    style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:20px 20px; border-radius:20px; margin-bottom:20px;">
                    <div class="buy-ticket-form">
                        <form class="form-register" id="form-regis" action="{{ route('regis') }}" method="POST">
                            @csrf

                            <h5 class="text-aja">Data Diri</h5>
                            <div class="mb-3 mt-3">

                                <input id="name" type="text" name="nama" placeholder="Nama Lengkap" required>

                            </div>
                            <div class="mb-3">

                                <input id="email" type="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="mb-3">

                                <input id="alamat" type="text" name="alamat" placeholder="Alamat Domisili" required>
                            </div>
                            <div class="mb-3">

                                <input id="kota" type="text" name="provinsi" placeholder="Provinsi" required>
                            </div>
                            <div class="mb-3">

                                <input id="no_hp" type="text" name="no_hp" placeholder="Nomor HP" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="fakultas" required>
                                    <option selected="selected" disabled>&nbsp; &nbsp; &nbsp; Alumni Fakultas</option>
                                    <option value="kia">&nbsp; &nbsp; &nbsp; Keluarga Ikatan Aumni</option>
                                    <option value="farmasi">&nbsp; &nbsp; &nbsp; Farmasi</option>
                                    <option value="hukum">&nbsp; &nbsp; &nbsp; Hukum</option>
                                    <option value="fbe">&nbsp; &nbsp; &nbsp; Bisnis Ekonomi</option>
                                    <option value="politeknik">&nbsp; &nbsp; &nbsp; Politeknik</option>
                                    <option value="psikologi">&nbsp; &nbsp; &nbsp; Psikologi</option>
                                    <option value="teknik">&nbsp; &nbsp; &nbsp; Teknik</option>
                                    <option value="industri">&nbsp; &nbsp; &nbsp; Industri Kreatif</option>
                                    <option value="teknobiologi">&nbsp; &nbsp; &nbsp; Teknobiologi</option>
                                    <option value="kedokteran">&nbsp; &nbsp; &nbsp; Kedokteran</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input readonly type="text" required id="datepicker" name="angkatan" placeholder="Tahun Angkatan" required/>

                                {{-- <select class="form-select" name="fakultas">
                                    <option selected="selected" disabled>&nbsp; &nbsp; &nbsp; Angkatan</option>
                                    @for ($i = 1950; $i <= 2018; $i++)
                                        <option value="{{ $i }}">&nbsp; &nbsp; &nbsp; {{ $i }}
                                        </option>
                                    @endfor

                                </select> --}}
                            </div>
                            <h5>Dengan donasi</h5>
                            <div class="pay-item">
                                <input type="radio" onclick="handleYesClick(this);" name="pay-1" checked value="Ya">
                                <span>Ya</span>
                            </div>
                            <div>
                                <input id="nominal" type="number" name="nominal" placeholder="Nominal" required
                                    onkeypress="return isNumber(event)" onkeyup="getamount(event)">
                            </div>
                            <br>
                            <div class="pay-item">
                                <input type="radio" onclick="handleNoClick(this);" name="pay-1" value="Tidak">
                                <span>Tidak</span>
                            </div>

                            <div class="price-final">
                                <span>price:</span>
                                <div class="price-final-text" id="final_price">Rp. 150.000</div>
                            </div>
                            <div class="btn-form-cover">
                                <button id="submitbtn" type="submit" class="btn"><span style="color: white">Bayar Sekarang</span></button>
                            </div>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var nominal = 0;

        function getamount(evt) {
            // console.log($('#nominal').val());
            if($('#nominal').val() == '') {

                nominal = 0 + 150000;
            } else {

                nominal = parseInt($('#nominal').val()) + 150000;
            }
            $("#final_price").text("Rp. " + nominal.toLocaleString('id-ID'));
        }
        var currentValue = 0;

        function handleYesClick(myRadio) {
            document.getElementById('nominal').setAttribute('required', '');
            document.getElementById('nominal').style.display = 'inline';

        }

        function handleNoClick(myRadio) {
            document.getElementById('nominal').removeAttribute('required', '');
            document.getElementById('nominal').style.display = 'none';
            document.getElementById('nominal').value = '';
            nominal = 150000;
            $("#final_price").text("Rp. " + nominal.toLocaleString('id-ID'));


        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            todayBtn: true,
            startDate: new Date(1950, 01, 01),
            endDate: new Date(),
        });


    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $("#form-regis").on("submit", function(){
            $("#pageloader").fadeIn();
        });
</script>
@endsection
