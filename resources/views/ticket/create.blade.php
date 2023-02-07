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
    <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="userId" name ="userId" value="{{Auth::user()->id}}">
    <input type="hidden" class="form-control" name ="eventId" id="eventId" value="{{$result['event_id']}}">
    <input type="hidden" class="form-control" name = "eventAttendees" id="eventAttendees" value="{{$result['attendees']}}">
    @for ($i = 0; $i < $result['attendees']; $i++)
    <div class="mb-3">
   
            <label for="attendName"  class="">Nama </label>
            <input type="text" id="attendName[]" name="attendName[]">

      
            <label  for="attendYear"class="">Year</label>
            <input type="text"  id="attendYear[]" name="attendYear[]">
 
            <label for="attendFaculty" class="">Faculty</label>
            <input type="text"  id="attendFaculty[]" name="attendFaculty[]">
        </div>
    @endfor
    <div class="mb-3">
            <label for="attendFaculty" class="">Bank</label>
            <select class="form-control" id="bank" name="bank">
       @foreach ($result['bank'] as $bank)
          <option value="{{ $bank->id }}">{{ $bank->name }}----{{ $bank->account }}</option>
       @endforeach
    </select>
        </div>

    <div class="mb-3">
            <label for="eventPrice" class="">Harga Total</label>
          <input type="text" class="form-control" name ="eventPrice" id="eventPrice" value="{{$result['price']}}" readonly>
        </div>
    <div class="mb-3">
    <label for="proof" class="col-md-4 control-label">Proof</label>
                                <input id="proof" type="file" class="form-control" name="proof" required>
                            </div>
                        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    
    </script>

</body>

</html>
