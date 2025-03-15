<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
</head>
<body>

<x-admin.sidebar/>

<div class="content">
  <h2>upload files [max limit 500MB]</h2>
  <br>
  <br>

<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

    <!-- file uploader -->
    <form action="{{url('/')}}/admin_file_upload" enctype="multipart/form-data" method="POST">
 @csrf
    <div class="mb-3">
    <label for="topic" class="form-label">Topic Name</label>
    <input type="text" class="form-control" name="topic" value="{{old('topic')}}" id="topic" required>
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">select file</label>
  <input class="form-control" type="file" name="formFile" id="formFile" value="{{old('formFile')}}" required>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
    <div class="col-2"></div>
</div>


</div>

</body>
</html>
