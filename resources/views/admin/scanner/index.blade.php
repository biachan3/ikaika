@extends('admin.template.dashboard')

@section('title')
Scanner
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css/custom-nvn.css')}}">

<style>
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
</style>
<script src="{{ asset('js/instascan.min.js') }}"></script>
@endsection

@section('content')
<div id="pageloader">
    <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
 </div>

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
                <label class="btn btn-primary active">
                    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
                  </label>
                  <label class="btn btn-secondary">
                    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
                  </label>

                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="response_scan"></div>
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

    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            // alert(cameras);
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
    function checkInClick()
    {
        $("#pageloader").fadeIn();
        var idtx = $("#idtiket").val();
        var attend = 0;
        var merch = 0;
        if ($('input#attend').is(':checked')) {
            attend=1;
        }
        if ($('input#merch').is(':checked')) {
            merch=1;
        }

        $.ajax({
            type:'POST',
            url:"{{route('scanner.changeStatus')}}",
            data: {
                '_token':'<?php echo csrf_token() ?>',
                id: idtx,
                attend: attend,
                merch: merch
            },
            success:function(data) {
                // console.log(data);
                $('#response_scan').html(data.msg)
                $("#pageloader").fadeOut();

            }
        });
    }
    function showDetailMhs(idtx)
    {
      var str = "kosong;";
        $.ajax({
            type:'POST',
            url:"{{route('scanner.getDetailData')}}",
            data: {
                '_token':'<?php echo csrf_token() ?>',
                id: idtx
            },
            success: function(data){
                $('#response_scan').html(data.msg)
            }

          });
    }
  </script>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

@endsection
