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
    @include('includes.navpost')

<div class="container">
  <h2>posts</h2>
  <p>HERE IS A TABLE WITH ALL posts Data:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>POST Title</th>
        <th>Description</th>
        <th>Auther</th>
        <th>Published</th>
        <th>Edit</th>
        <th>show</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($posts as $posts)
        <td>{{$posts->post_title}}</td>
        <td>{{$posts->description}}</td>
        <td>{{$posts->auther}}</td>
        <td>@if($posts->published)
                Yes
            @else
                No
            @endif</td>
            <td><a href="editpost/{{ $posts->id }}">Edit</a></td>
            <td><a href="showpost/{{ $posts->id }}">show</a></td>
        
      </tr>

    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>