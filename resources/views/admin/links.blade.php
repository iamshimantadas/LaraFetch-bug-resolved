<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<script src="jquery.js"></script>
<body>

<x-admin.sidebar/>


<div class="content">
  <h2>links</h2>

  <br>

 <div>
    <form action="{{url('/')}}/admin_post_search" method="POST">
        @csrf
    <input type="text" id="search_query" name="topicName" placeholder="search here.." >
    {{ csrf_field() }}
    <input type="submit" class="btn btn-success" value="search">
    </form>
    <div id="search_results"></div>
</div>

<br>

  <!-- links table -->
  <table class="table">
  <thead>
    <tr>
      <th scope="col">File ID</th>
      <th scope="col">Topic</th>
      <th scope="col">File Hash</th>
      <th scope="col">Link</th>
      <th scope="col">Modify</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($link as $link)
    <tr>
      <th scope="row">{{$link->id}}</th>
      <td>{{$link->topic}}</td>
      <td> {{$link->filename}}</td>
      <form action="{{url('/')}}/copylink" method="POST">
      @csrf
      <input type="hidden" name="topicname" value="{{$link->topic}}" required>
      <input type="hidden" name="filelink" value="{{$link->filename}}" required>
      <td><button type="submit" class="btn btn-warning">copy link</button> </td>
      </form>
      <form action="{{url('/')}}/admin_file_modify" method="POST">
        @csrf
        <input type="hidden" name="topicid" value="{{$link->id}}" required>
        <input type="hidden" name="topicname" value="{{$link->topic}}" required>
      <input type="hidden" name="filelink" value="{{$link->filename}}" required>
      <td><button class="btn btn-success">Modify</button></td>
      </form>
      <td>{{$link->date}}</td>
      <form action="{{url('/')}}/deletefile" method="POST">
        @csrf
        <input type="hidden" name="topicid" value="{{$link->id}}" required>
      <input type="hidden" name="filelink" value="{{$link->filename}}" required>
      <td>
        <button type="submit" class="btn btn-danger">delete</button>
      </td></form>

    </tr>

    @endforeach
  </tbody>
</table>


</div>



</body>

<script>
$(document).ready(function(){

    $('#search_query').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('searchsuggestion') }}",
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                  console.log("string found!");
                $('#search_results').fadeIn();
                    $('#search_results').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        $('#search_query').val($(this).text());
        $('#search_results').fadeOut();
    });

});
</script>


</html>
