<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>download gateway</title>
    <link rel="icon" type="image/x-icon" href="icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>


  <br>
  <br>
  <br>


  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">

    <form action="{{url('/')}}/file_process" method="GET">
        @csrf
        <input type="hidden" name="filename" value="{{$downloadFilename}}" required>
        <input type="hidden" name="topic" value="{{$topic}}" required>
    <button class="btn btn-warning" style="font-size:30px;margin-left:auto;margin-right:auto;">DOWNLOAD FILE</button>
    </form>


    </div>
    <div class="col-2"></div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
