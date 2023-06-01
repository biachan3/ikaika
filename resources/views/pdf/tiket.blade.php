<!DOCTYPE html>
<html>
<head>
	<title>Tiket {{$nomer}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://fonts.cdnfonts.com/css/times-new-roman" rel="stylesheet">

<style>
</style>

</head>
<body style="background-image: url(./image-template/tiketpalingfinal.png); background-size: cover; height:200px;">
	<style type="text/css">
        @font-face {
            font-family: "klik";
            src: url("/Klik-Light.otf");
            font-weight: lighter;
        }

		  @page { margin: 0in; }
        table tr td,
		table tr th{
			font-size: 9pt;
		}
        h5{
            font-size: 1em;
        }
        h6{
            font-size: 1em;
        }

        .column1 {
        /* margin-left: 10px; */
        margin-top: 800px;
        float: left;
        width: 50%;
        }
        .column2 {
        /* margin-left: 100px; */
        float: left;
        width: 50%;
        }
        .column3 {
        margin-left: 80px;
        float: left;
        width: 50%;
        /* text-align: center; */
        }
        .column4 {
        margin-left: 20px;
        float: left;
        width: 50%;
        /* text-align: center; */
        }
        .c5 {
        /* margin-left: 20px; */
        float: left;
        width: 50%;
        text-align: center;
        }

        /* Clear floats after the columns */
        .row:after {

        content: "";
        display: table;
        clear: both;
        }
        .nama1{
            top:880px;
            left: 500px;

            color: #695345;
            font-family: 'klik', sans-serif;
            font-size: 2em;
            position: fixed;
        }
        .nama2{
            top:890px;
            left: 500px;

            color: #695345;
            font-family: 'klik', sans-serif;
            font-size: 2.5em;
            position: fixed;
        }
        .undian{
            margin-top:7px;
            margin-left: 700px;
            color: #000000;
            font-family: 'Times New Roman', sans-serif;
            font-size: 2em;
        }
        .dear{
            margin-top:330px;
            margin-left: 60px;
            text-align: center;
            color: #BC7128;
            font-family: 'Times New Roman', sans-serif;
            font-size: 1.5em;
        }
        .nomer{
            margin-top:810px;
            margin-left: 500px;
            color: #695345;
            font-family: 'klik', sans-serif;
            font-size: 2.8em;
            padding-bottom:10%;
            width: 900px;
        }
        .qr{
            height: 370px;
            top: 1255px;
            left: 538px;
            position: fixed;
        }
	</style>
    <section>
        <div class="nomer" style="margin-bottom:20px">{{$nomer}}</div>
        @if ($size==true)
        <div class="nama1">{{$name}}</div>

        @else
        <div class="nama2">{{$name}}</div>

        @endif
        <img src="data:image/png;base64, {!! $qr !!}" class="qr">
        {{-- <div class="row">
            <div class="column2">
            </div>
            <div class="column1">
            </div>
        </div> --}}


    </section>
</body>
</html>
