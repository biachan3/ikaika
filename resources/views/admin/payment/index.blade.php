<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  </head>
  <body>
    <button id="pay-button">Pay!</button>
    <script>
    $('#pay-button').on('click', function(e) {
            $.ajax({
            type: "POST",
            url: "{{ route('payment.ping') }}",
            data: {
                '_token': '<?php echo csrf_token() ?>',
                // 'idprovinsi': idprovinsi
            },
            success: function(data) {
                    // $('.kota_select').empty();
                    // $('.kota_select').append('<option value="">--Pilih Kota--</option>');
                    // for (let i = 0; i < data.listkota.length; i++) {
                    //     $('.kota_select').append('<option value="'+data.listkota[i].idkota+'">'+data.listkota[i].nama_kota+'</option>');
                    // }
                    // if (kota != "") {
                    //     $('#kotaSelect').val(kota).change();
                    // }
                    var resp = $.parseJSON(data);
                    console.log(resp.token);
                    snap.pay(resp.token);
                }
            })
        });
    </script>
    <script type="text/javascript">
    //   var payButton = document.getElementById('pay-button');
    //   payButton.addEventListener('click', function () {
    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('payment.ping') }}",
    //         data: {
    //             '_token': '<?php echo csrf_token() ?>',
    //             // 'idprovinsi': idprovinsi
    //         },
    //         success: function(data) {
    //             // $('.kota_select').empty();
    //             // $('.kota_select').append('<option value="">--Pilih Kota--</option>');
    //             // for (let i = 0; i < data.listkota.length; i++) {
    //             //     $('.kota_select').append('<option value="'+data.listkota[i].idkota+'">'+data.listkota[i].nama_kota+'</option>');
    //             // }
    //             // if (kota != "") {
    //             //     $('#kotaSelect').val(kota).change();
    //             // }
    //             console.log(data);
    //             // snap.pay('c9306b7f-7cac-4c4d-8df0-3ab64f365633');
    //         }
    //     })
    //   });
    </script>
  </body>
</html>
