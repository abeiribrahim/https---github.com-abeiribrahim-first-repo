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
  <p>HERE IS A TABLE WITH ALL post TYPES:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>title</th>
        <th>description</th>
        <th>published</th>

        <th>Delete</th>
        <th>Restore</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($posts as $post)
        <td>{{$post->post_title}}</td>
        <td>{{$post->description}}</td>
        <td>@if($post->published)
                Yes
            @else
                No
            @endif</td>

            <td><a href="forceDelete/{{ $post->id }}"onclick = "return confirm('Are you sure you want to delete?')"; >Delete</a></td>
            <td><a href="restore/{{ $post->id }}" >Restore</td>
      </tr>

    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>