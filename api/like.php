<?php 
//one api
require_once("../header.php");
session_start();

echo "The time is " . date("h:i:sa") . "<br/>";
echo "post test ok ".$_POST['id']."<br/>";
print_r($_POST);
echo "<br/> get test ok <br/>";
print_r($_GET);

$err = 0;
if (!isset($_SESSION['user_id'])){
    echo "error : no user logged in<br/>";
    $err = 1; 
}
else if (!isset($_POST['action'])){
    echo "error : unspecified action<br?>";
    $err = 1;
}
if ($err == 0){
    $user   = get_specific("id","users","username",$_SESSION['user_id']);
    $action = $_POST['action'];
    $galleryid = $_POST['form_id'];
}

if ($err == 1){
    //output_error("failed fuck my life");
}
else if ($action === "like"){
    echo "running is liked"."<br />";
    $test = is_liked($user, $galleryid);
    echo "$test"."<br />";
    echo "action found";
    if (is_liked($user,$galleryid)){
        echo "Removing like"."<br />";
        echo "$user"."<br />";
        echo "$galleryid";
        echo "<br />";
        remove_like($user, $galleryid);
    }
    else{
        echo "adding like";
        add_like($user,$galleryid);
    }
}
$page = $_GET['page'];
$prev_pos = $_GET['prev_pos'];
header("Location: ../index.php?page=$page&prev_pos=$prev_pos")
?>