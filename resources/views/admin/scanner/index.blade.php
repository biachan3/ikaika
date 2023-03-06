<!DOCTYPE html>

<html>

<head>

	<title>Scan your Graduation Barcode</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- <script src="boostrap.js"></script> -->
	<!-- <script src="jquery.min.js"></script> -->

	<script src="{{ asset('js/instascan.min.js') }}"></script>

</head>



<body>
<a href=""> < Kembali </a>
<div class="jumbotron text-center">
  <h1>Anu</h1>
  LogData Terakhir: <h3 id="showinfo"> </h3>
  <p>
  <video id="preview"></video>
  </p>
</div>


</div>



    <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

      scanner.addListener('scan', function (content) {
        console.log(content);
        showDetailMhs(content);
        setTimeout(() => {

            if (confirm('Apakah anda dengan data di atas? Bila data "NULL", maka otomatis data scan tidak akan masuk.')) {
                // Save it!
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
                // Do nothing!
                  alert('Thing was not saved to the database.');
                }
        }, 1000);


      });

      Instascan.Camera.getCameras().then(function (cameras) {

        if (cameras.length > 0) {

          scanner.start(cameras[1]);//bila di mobile adalah kamera belakang

        } else {

          console.error('No cameras found.');

        }

      }).catch(function (e) {

        console.error(e);

      });

      function showDetailMhs(content)
      {
        var str = "kosong;";
          $.ajax({
              type:'POST',
              url:'',
              data: '_token=<?php echo csrf_token() ?>&idwsd='+content,
              success:function(data) {
                var str = data.pesan;
                var res = str.split(";");
                $("#showinfo").html("NRP: " + res[0] + " | Nama: "+ res[1] + " | Nomor Kursi:  " + res[2] );

              }
            });
          return str;
      }
    </script>



</body>

</html>
