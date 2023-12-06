​  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="{{ route('logged') }}" method="post">
  @csrf

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" name="email">
    </div><br><br>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" name="pwd">
    </div><br><br>
    <div class="checkbox">
      <label><input type="text" name="name"> Remember me</label>

    </div><br><br>
    <button input type="submit">Submit</button>
  </form>
</div>

</body>
</html>