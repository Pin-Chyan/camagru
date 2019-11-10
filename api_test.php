<!DOCTYPE HTML>
<html>  
<body>
<?php
$i = 1;
$max = 11;

while ($i < $max){
echo "
<form  action=\"api/posts.php\" method=\"POST\">
<input type=\"hidden\" name=\"action\" value=\"the desired action\">
<input type=\"hidden\" name=\"form_id\" value=\"the respective image id\">
<input type=\"\" name=\"sub_action\" value=\"the sub action\">
<input type=\"submit\" name=\"sub_action\" value=\"button name\">
</form>
";
$i++;
}
echo "
<form  action=\"api/comment.php\" method=\"POST\">
<input type=\"hidden\" name=\"action\" value=\"add\">
<input type=\"visible\" name=\"form_id\" value=\"id\">
<label> Comment: <br>
<textarea name=\"comment\" class=\"Input comment-box\" required></textarea>
</label><br>
<input type=\"submit\" name=\"sub_action\" value=\"comment\">
</form>
";
echo "
<form  action=\"api/comment.php\" method=\"POST\">
<input type=\"hidden\" name=\"action\" value=\"delete\">
<input type=\"visible\" name=\"form_id\" value=\"id\">
<input type=\"submit\" name=\"sub_action\" value=\"delete\">
</form>
";
?>

</body>
</html>