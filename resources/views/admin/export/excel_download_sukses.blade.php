<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Cetak Rekap</title>
</head>
<body>
    <center>
        <h5>DATA PESERTA REUNI UBAYA 2023 <br>PER
        @php
            echo date("Y-m-d H:i:s");
        @endphp</h5>
    </center>
    <br>
    <table id="d">
        <tbody>
            <tr style="text-align: center">
                <td><b>NO</b></td>
                <td><b>ID TRANSAKSI</b></td>
                <td><b>NAMA LENGKAP</b></td>
                <td><b>FAKULTAS</b></td>
                <td><b>ANGKATAN</b></td>
                <td><b>NO HP</b></td>
                <td><b>HADIR</b></td>
                <td><b>MERCH</b></td>
                <td><b>WAKTU CHECK IN</b></td>
            </tr>

            @foreach ($data as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->id}}</td>
                <td>{{$d->nama_lengkap}}</td>
                <td style="text-transform: capitalize;">{{$d->fakultas}}</td>
                <td>{{$d->angkatan}}</td>
                <td>{{$d->no_hp}}</td>
                <td>{{$d->is_check_in}}</td>
                <td>{{$d->is_take_merch}}</td>
                <td>{{$d->check_in_time}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>

</body>
</html>
