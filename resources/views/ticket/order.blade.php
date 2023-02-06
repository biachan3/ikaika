<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1>Registrasi Acara</h1>
    {!! Form::model($question, ['method' => 'PUT', 'route' => ['event.create', $result->event->id]]) !!}
        <div class="mb-3">
            <label  class="">Nama Acara</label>
            <div id="eventName" >{{$result->event->name}}</div>
        </div>
        <div class="mb-3">
            <label  class="">Deskripsi Acara</label>
            <div id="eventDescription" >{{$result->event->description}}</div>
        </div>
        <div class="mb-3">
            <label  class="">Mulai Acara</label>
            <div id="eventStarteven" >{{$result->event->startevent}}</div>
        </div>
        <div class="mb-3">
            <label  class="">Ahkir Acara</label>
            <div id="eventEndevent" >{{$result->event->endevent}}</div>
        </div>
        <div class="mb-3">
            <label class="">Harga per Ticket</label>
            <div id="eventPrice" name="eventPrice" >{{$result->event->price}}</div>
        </div>
        <div class="mb-3 ">
        <label class="form-label" for="attendees">Jumlah Orang Maksimal 3 Orang</label>
            <input type="number" nama="attendees" min="1" max="3" class="form-input" id="attendees">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga Total</label>
            <input type="text" id="price" name="price" value="" readonly>
        </div>
        <input type="hidden" class="form-control" id="exampleInputPassword1" value="{{$results->event->id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        var prices = JSON.parse("{{ json_encode($result->event->price) }}");
        $(document).ready(function(){
    $('#attendees').change(function(){
        $('#price').text($(this).val() * prices);
    });    
});​
    </script>
</body>

</html>
