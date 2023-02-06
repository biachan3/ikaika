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
    <h1>Hello, world!</h1>
    <table class="table table-bordered table-striped">
        
    <tr class="">
    <th>Name</th>
</tr>
<tr class="">
    <th>Description</th>
</tr>
<tr class="">
    <th>Start Date</th>
</tr>
<tr class="">
    <th>End Date</th>
</tr>
<tr class="">
    <th>price</th>
</tr>
<tr class="">
    <th>Register</th>
</tr>
    @foreach($results as $result)
    
                        <tr class="">
                            <td>{{$result->$name}}<td>
                        </tr>
                        <tr class="">
                            <td>{{$result->$description}}<td>
                        </tr>
                        <tr class="">
                            <td>{{$result->$startdate}}<td>
                        </tr>
                        <tr class="">
                            <td>{{$result->$enddate}}<td>
                        </tr>
                        <tr class="">
                            <td>{{$result->$price}}<td>
                        </tr>
                        <tr class="">
                            <td> <a href="{{ route('ticket.order', $result->$id}}"
                                        class="btn btn-xs btn-info">Register</a><td>
                        </tr>
                @endforeach
                </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
