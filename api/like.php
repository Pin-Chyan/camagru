<?php 
//one api
require_once("../header.php");
session_start();

basic_html();
$line = $_POST["like"];
add_comment(1,1,"ajax run 2 ".$_GET['id']." ".$_GET['action']." post test ".$line);
$err = 1;
if (!isset($_REQUEST['action']) || !isset($_SESSION['user_id']) || !isset($_REQUEST['sub_action']) || !isset($_REQUEST['id'])){
    if (!isset($_REQUEST['action'])){
        echo "error : no action\n";
        $err = 0;
    }
    if (!isset($_REQUEST['sub_action'])){
        echo "error : no sub action\n";
        $err = 0;
    }
    if (!isset($_REQUEST['id'])){
        echo "error : no user id\n";
        $err = 0;
    }
    if (!isset($_SESSION['user_id'])){
        echo "error : no user logged in\n";
        $err = 0;
    }
}

if ($err == 1){
    $id         =$_REQUEST['id'];
    $action     =$_RESUEST['action'];
    $sub        =$_REQUEST['sub_action'];
    $key        =$_REQUEST['key'];
    $value      =$_REQUEST['value'];
    $user_id = get_specific("id","users","username",$_SESSION['user_id']);
}

if ($err == 0)
{
    echo "\ninput exception\n";
}
else if ($action === "like"){
    if ($sub === "add"){
        add_like($user_id,$id);
    }
}
$i = $_REQUEST['donuts'];
header("Location: ../home_html.php?page=$i");
?>