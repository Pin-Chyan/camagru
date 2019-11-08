<?php
require_once("./header.php");

// session_start();

add_comment(1,2,"ajax run");
if ($username)
{
    add_comment(1,1,$username);
}
// if (!isset($_POST['action']))
// {
//     echo ("error : no action posted" . PHP_EOL);
// }
// else if ($_POST['action'] === 'add'){
//     //header("Location: http://localhost:8080/camagru/home_html.php?page=3");
//     echo "add post detected \n";
//     add_like(1,6);
// }
?>