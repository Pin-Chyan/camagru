<?php 
require_once("../header.php");
session_start();


// echo "The time is " . date("h:i:sa") . "<br/>";
// echo "post test ok ".$_POST['id']."<br/>";
// print_r($_POST);
// echo "<br/> get test ok <br/>";
// print_r($_GET);

//check error start 
$err = 0;
if (!isset($_SESSION['user_id'])){
    echo "error : no user logged in<br/>";
    $err = 1; 
}
else if (!isset($_POST['action'])){
    echo "error : unspecified action<br?>";
    $err = 1;
}
//finish error check
if ($err == 0){
    $user   = get_specific("id","users","username",$_SESSION['user_id']);
    $action = $_POST['action'];
    $galleryid = $_POST['form_id'];
}

if ($err == 1)
{
    echo "please code properly next time UWU<br/>";
}
else if ($action === "add"){
    if (isset($_POST['comment'])){
        add_comment($user,$galleryid,$_POST['comment']);
    }
}
else if ($action === "delete"){
    delete_specific("comments","id",$_POST['form_id']);
}
$page = $_GET['page'];
header("Location: ../home_html.php?page=$page");
?>