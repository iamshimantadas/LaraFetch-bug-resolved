<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
</head>
<body>
    
<br>
<br>
<p class="text-center fs-3">Login Page</p>
<br>
<br>

<div class="row">
<div class="col-2"></div>
<div class="col-8">

<form action="{{url('/')}}/admin_login" method="POST">
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
    </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<div class="col-2"></div>
</div>

</body>
<script src="bootstrap\bootstrap.bundle.min.js"></script>
</html>