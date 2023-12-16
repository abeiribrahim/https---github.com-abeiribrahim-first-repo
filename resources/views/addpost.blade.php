<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includes.navpost')
<div class="container">
  <h2>Add new Post data</h2>
  <form action="{{route('storepost')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="post_title">Title:</label>
      <input type="text" class="form-control" id="post_title" placeholder="Enter title" name="post_title"  value="{{old('post_title')}}">
      @error('post_title')
      {{$message}}
      @enderror
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea class="form-control" name="description" id="" cols="60" rows="3"value="{{old('description')}}" ></textarea>
      @error('description')
      {{$message}}
      @enderror
    </div>
    <div class="form-group">
      <label for="auther">Auther:</label>
      <input type="text" class="form-control" id="auther" placeholder="Enter name" name="auther">
    </div>
    
    <div class="checkbox">
      <label><input type="checkbox" name="published"> Published me</label>
    </div>
    <button type="submit" class="btn btn-default">Insert</button>
  </form>
</div>

</body>
</html>