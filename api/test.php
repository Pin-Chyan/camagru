<?php 
require_once("../header.php");
session_start();
$lol = $_REQUEST['id'];
if ($lol)
    add_comment(1,2,"ajax run like button user ".$_SESSION['user_id']." liked img ".$_REQUEST['id']);
// if (isset($_SESSION['user_id']))
//     //echo "logged in\n ";
// if (isset($_GET['q']))
// {
//     add_comment(1,2,"ajax run ".$_GET['username']);
//     //echo "comment is added ".$_GET['username'];
// }
// else
//     echo "no isset";
?>