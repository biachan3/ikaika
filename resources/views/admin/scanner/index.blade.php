@extends('admin.template.dashboard')

@section('title')
Scanner
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/custom-nvn.css')}}">

<script src="{{ asset('js/instascan.min.js') }}"></script>
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Scanner</h1>
    </div>

    <!-- Content Row -->


    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-lg-6">
            <div class="jumbotron text-center">
                ID Transaksi: <h3 id="showinfo"> </h3>
                <p>
                <video id="preview" class="camera-rwd"></video>
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <div>
                <div id="detaildata">
                    <p>Nama Lengkap : Anu hehehe</p>
                    <p>Email : Anu hehehe</p>
                    <p>No HP : 081234567890</p>
                    <p>Alumni Fakultas : Teknik</p>
                    <p>Angkatan : 2018</p>
                    <p>Status Bayar : Lunas</p>
                </div>

                <button class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-check fa-sm text-white-50"></i> Check-In</button>
            </div>
        </div>
        <!-- Pie Chart -->

    </div>

    <!-- Content Row -->


</div>
<script type="text/javascript">

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

    scanner.addListener('scan', function (content) {
      console.log(content);
      $("#showinfo").html(content);
      showDetailMhs(content);

    });

    Instascan.Camera.getCameras().then(function (cameras) {

      if (cameras.length > 0) {

        scanner.start(cameras[0]);//bila di mobile adalah kamera belakang

      } else {

        console.error('No cameras found.');

      }

    }).catch(function (e) {

      console.error(e);

    });
    function checkInClick()
    {
        if (confirm('Apakah anda dengan data di atas? Bila data "NULL", maka otomatis data scan tidak akan masuk.')) {
            $.ajax({
                type:'POST',
                url:'',
                data: '_token=<?php echo csrf_token() ?>',
                success:function(data) {
                    $("#showinfo").html(data.msg);
                }
            });
            alert('Thing was saved to the database. ');
        } else {
            alert('Thing was not saved to the database.');
        }
    }
    function showDetailMhs(idtx)
    {
      var str = "kosong;";
        $.ajax({
            type:'POST',
            url:'',
            data: {
                '_token':'<?php echo csrf_token() ?>',
                id: idtx
            },
            success:function(data) {
                console.log(data);
                var str = data.pesan;
                var res = str.split(";");
                $("#detaildata").html(`
                    <p>Nama Lengkap : Anu hehehe</p>
                    <p>Email : Anu hehehe</p>
                    <p>No HP : 081234567890</p>
                    <p>Alumni Fakultas : Teknik</p>
                    <p>Angkatan : 2018</p>
                    <p>Status Bayar : Lunas</p>
                `);
            }
          });
        return str;
    }
  </script>
@endsection

@section('script')
@endsection
