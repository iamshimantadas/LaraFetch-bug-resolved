<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
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

<body>

<x-admin.sidebar/>

<div class="content">
  <h2>Overview</h2>

  <font style="font-size:20px;">Total Downloads: </font>{{$count}}
  <br>
  <br>

  <div style="overflow-x: auto;">
  <table>
    <tr>
      <th>Name</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
    @foreach($rec as $rec)
    <tr>
      <td>{{$rec->name}}</td>
      <td>{{$rec->date}}</td>
      <td>{{$rec->time}}</td>
    </tr>
    @endforeach
  </table>
</div>

</div>

</body>
</html>
