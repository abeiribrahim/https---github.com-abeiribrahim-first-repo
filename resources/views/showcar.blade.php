<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Car</title>
</head>
<body>
<div class="container">
  <h2>Show car data</h2>
  <form action="{{route('showcar',$cars->id)}}" method="post">
    @csrf
    <h1>{{$cars->title}}</h1>
    <h1>{{$cars->description}}</h1>
    <h1>{{$cars->created_at}}</h1>
    <h1>{{$cars->updated_at}}</h1>
    <p>{{ $cars->published? "Published" : "Not Published" }}</p>
    
    </div>
</body>
</html>