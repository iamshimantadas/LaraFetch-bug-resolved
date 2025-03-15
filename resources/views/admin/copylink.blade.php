<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<x-admin.sidebar/>

<div class="content">
  <h2>Copy Link</h2>
  <br>
  <br>

  <input type="text" id="myInput" value="localhost:8000/file_download/{{$link}}/{{$topic}}">
  <button onclick="myFunction()">copy link</button>

</div>

</body>
<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}
</script>
</html>




