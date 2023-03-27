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
<body style="background-image: url(./image-template/pdftiket.png); background-size: cover; height:200px;">
	<style type="text/css">
        @font-face {
            font-family: "Times New Roman";
            src: url("/times.ttf");
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
        margin-top: 240px;
        float: left;
        width: 30%;
        }
        .column2 {
        /* margin-left: 100px; */
        float: left;
        width: 70%;
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
        .nama{
            /* margin-top:239px;
            margin-left: 520px; */

            color: #000000;
            font-family: 'Times New Roman', serif;
            font-size: 1.2em;
        }
        .undian{
            margin-top:7px;
            margin-left: 700px;
            color: #000000;
            font-family: 'Times New Roman', serif;
            font-size: 2em;
        }
        .dear{
            margin-top:330px;
            margin-left: 60px;
            text-align: center;
            color: #BC7128;
            font-family: 'Times New Roman', serif;
            font-size: 1.5em;
        }
        .nomer{
            /* margin-top:20px;
            margin-left: 520px; */
            color: #000000;
            font-family: 'Times New Roman', serif;
            font-size: 1.2em;
        }
        .qr{
            height: 280px;
            margin-top: 141px;
            margin-left: 103px;
        }
	</style>
    <section>
        <div class="row">
            <div class="column2">
                <img src="data:image/png;base64, {!! $qr !!}" class="qr">
            </div>
            <div class="column1">
                <div class="nomer" style="margin-bottom:20px"><b>{{$nomer}}</b></div>
                <div class="nama"><b>{{$name}}</b></div>
            </div>
        </div>


    </section>
</body>
</html>
