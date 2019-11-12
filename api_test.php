<?php 
require_once("header.php");
?>
<!DOCTYPE HTML>
<html>  
<body>

<div id="demo">
  <h2>Let AJAX change this text</h2>
  <button type="button" onclick="bigD()">butt</button>
</div>

<script>
function bigD() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "api/posts.php", true);
  xhttp.send("action='upload'");
}
</script>
</body>
</html>