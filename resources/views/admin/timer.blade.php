<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>

<x-admin.sidebar/>

<div class="content">
  <h2>Timer</h2>

  <br>

  <form action="{{url('/')}}/admin_timer_req" method="POST">
    @csrf
    <input type="text" name="timer" requied>
    <button type="submit">submit</button>
  </form>

  <br>
  <br>


  <div style="overflow-x: auto;">
  <table>
    <tr>
      <th>TIMER</th>
      <th>DATE</th>
      <th>TIME</th>
    </tr>
    @foreach($time as $time)
    <tr>
      <td>{{$time->downloadsec}}</td>
      <td>{{$time->date}}</td>
      <td>{{$time->time}}</td>
    </tr>
    @endforeach
  </table>
</div>
</div>

</body>
</html>
