<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraFetch ~ CDN for microblogs.in</title>
    <link rel="icon" type="image/x-icon" href="icon.png">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<style>
    /* Add glowing effect to buttons */
    .glow-button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      background-color: #007bff;
      color: #fff;
      text-align: center;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .glow-button:hover {
      box-shadow: 0 0 20px rgba(0, 123, 255, 0.8);
    }
  </style>

<body>

<div class="container text-center mt-5">
    <h1>Welcome to LaraFetch</h1>
    <p>Explore our resources to learn programming!</p>

    <div class="row mt-4">
      <div class="col">
        <a href="{{url('/')}}/admin" class="glow-button" style="background-color:yellow;color:black;">Admin Panel</a>
      </div>
    </div>

    <br>

    <div class="row mt-4">
    <p class="text-center fs-3">Browse tutorials and Download notes</p>    
    <br>
    <div class="col-md-3">
        <a href="https://java.microcodes.in/index.php/basic/introduction-to-java/" class="glow-button">Learn Java</a>
      </div>
      <div class="col-md-3">
        <a href="https://php.microcodes.in/index.php/basics/introduction-to-php/" class="glow-button">Learn PHP</a>
      </div>
      <div class="col-md-3">
        <a href="https://dart.microcodes.in/index.php/basics/introduction/" class="glow-button">Learn Dart</a>
      </div>
      <div class="col-md-3">
        <a href="https://dbms.microcodes.in/index.php/basics/data-database-dbms/" class="glow-button">Learn MySQL</a>
      </div>
    </div>
  </div>


</body>

<br>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">&copy; <?php echo date("Y"); ?> <a href="https://microcodes.in/">microcodes.in</a> </span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/profile.php?id=100078406112813"> <i class="bi bi-facebook"></i> </a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/meshimanta/"> <i class="bi bi-instagram"></i> </a></li>
      <li class="ms-3"><a class="text-muted" href="https://twitter.com/Shimantadas247"> <i class="bi bi-twitter"></i> </a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/shimanta-das-497167223/"> <i class="bi bi-linkedin"></i> </a></li>
      <li class="ms-3"><a class="text-muted" href="https://github.com/iamshimantadas?tab=repositories"> <i class="bi bi-github"></i> </a></li>
      
    </ul>
  </footer>
</div>


<script src="bootstrap/bootstrap.bundle.min.js"></script>
</html>
