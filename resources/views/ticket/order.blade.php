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
    
        <div class="mb-3">
            <label  class="">Nama Acara</label>
            <div id="eventName" >{{$result['event'][0]->name}}</div>
        </div>
        <div class="mb-3">
            <label  class="">Deskripsi Acara</label>
            <div id="eventDescription" >{{$result['event'][0]->description}}</div>
        </div>
        <div class="mb-3">
            <label  class="">Mulai Acara</label>
            <div id="eventStarteven" >{{$result['event'][0]->startevent}}</div>
        </div>
        <div class="mb-3">
            <label  class="">Akhir Acara</label>
            <div id="eventEndevent" >{{$result['event'][0]->endevent}}</div>
        </div>
  
        
        <form action="{{ route('ticket.create') }}" method="get">
 
        <div class="mb-3">
            <label class="">Harga per Ticket</label>
            <input type="text" class="form-control" id="eventPrice" name="eventPrice" value="{{$result['event'][0]->price}}" readonly>
        </div>

        <div class="mb-3 ">
        <label class="form-label" for="attendees">Jumlah Orang Maksimal 3 Orang</label>
            <input type="number" name="attendees" min="1" max="3" class="form-input" id="attendees" val="1">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga Total</label>
            <!-- <input type="number" id="price" name="price" value="0" > -->
        </div>
       
        <input type="hidden" class="form-control" id="eventId" name="eventId" value="{{$result['event'][0]->id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    
    </script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
        
         $(document).ready(function() {
            window.Laravel = { csrfToken: '{{ csrf_token() }}' };
            var prices = $('#harga').data('price');
            document.addEventListener('DOMContentLoaded',function() {
                document.querySelector("#attendees").onchange=check;
            },false);
            function check(event) {
                $('#price').prop('readonly',false);
                $('#price').val($(this).val() * 20);
                $('#price').prop('readonly',true);
            }   
        });
    </script> -->
</body>

</html>
