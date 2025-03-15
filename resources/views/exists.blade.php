<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Exists Neon Effect</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
  <style>
    body {
  background-color: #111;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  font-family: Arial, sans-serif;
}

.container {
  text-align: center;
}

.neon-text {
  font-size: 48px;
  color: #fff;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  animation: neon 1.5s ease-in-out infinite;
}

@keyframes neon {
  0%, 100% {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff;
  }
  50% {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #00f, 0 0 40px #00f, 0 0 70px #00f, 0 0 80px #00f, 0 0 100px #00f;
  }
}

.go-to-dashboard-btn {
  margin-top: 20px;
  background-color: #00f;
  color: #fff;
  font-size: 18px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.go-to-dashboard-btn:hover {
  background-color: #0077ff;
}

  </style>
</head>
<body>
  <div class="container">
    <div class="neon-text">
      File Exists
    </div>
    <a href="{{url('/')}}/admin_file"><button class="go-to-dashboard-btn">AGAIN UPLOAD FILES</button></a>
  </div>
</body>
</html>
