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
<input type=\"hidden\" name=\"sub_action\" value=\"the sub action\">
<input type=\"submit\" name=\"sub_action\" value=\"button name\">
</form>
";
$i++;
}
?>

</body>
</html>