<!DOCTYPE html>
<html lang="en">
<head>
<form action="" method="post">
    @csrf
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @include('includes.nav')

<div class="container">
  <h2>Cars</h2>
  <p>HERE IS A TABLE WITH ALL CAR TYPES:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>title</th>
        <th>description</th>
        <th>published</th>
        <th>Edit</th>
        <th>show</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($cars as $car)
        <td>{{$car->title}}</td>
        <td>{{$car->description}}</td>
        <td>@if($car->published)
                Yes
            @else
                No
            @endif</td>
            <td><a href="editCar/{{ $car->id }}">Edit</a></td>
            <td><a href="showcar/{{ $car->id }}">show</a></td>
        
      </tr>

    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>