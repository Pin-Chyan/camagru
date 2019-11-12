<?php 
require_once("header.php");
$img = get_specific("img","gallery","id",3);
?>
<!DOCTYPE HTML>
<html>  
<body>

<div id="demo">
  <h2>Let AJAX change this text</h2>
  <button type="button" onclick="XHR()">butt</button>
  <text>Stuff<?php echo $img;?></text>
</div>

<script>
function XHR()
{
  // build the request object and actions
  let img = canvas.toDataURL();
  console.log(img);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "api/posts.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var str = "action=test1&img=" + img;
  xhttp.send(str);
}
</script>
</body>
</html>