<?php
require_once("../header.php");
session_start();

$galleryid	= $_POST['form_id'];
$action		= $_POST['action'];
$sub_action	= $_POST['sub_action'];
$user   	= get_specific("id","users","username",$_SESSION['user_id']);
$img		= $_POST['img'];

// echo "The time is " . date("h:i:sa") . "<br/>";
// echo "post test ok ".$_POST['id']."<br/>";
// print_r($_POST);
// echo "<br/> get test ok <br/>";
// print_r($_GET);
// add_comment(1,2,"upload start");
// if (isset($_POST['img'])){
// 	add_comment(1,2,"img is set");
// }

// add_comment(1,2,"upload end");
if (!isset($_SESSION['user_id'])){
	echo "error : unknown user<br/>";
}
else if ($action === "delete") {
	if (!isset($_POST['form_id']))
		echo "error : gallery id not specified<br/>";
	else{
		delete_specific("gallery", "id", $galleryid);
		delete_specific("comments","galleryid", $galleryid);
		delete_specific("like","galleryid", $galleryid);
	}
}
else if ($action === "upload"){
	if (!isset($_REQUEST['img']))
		echo "error : no image specified<br/>";
	else if (!isset($_REQUEST['sub_action']))
		echo "error : no sub action specififed";
	else if ($sub_action === "gallery")
		upload_img($user,$img,"gallery");
	else if ($sub_action === "users")
		upload_img($user,$img,"users");
	else if ($sub_action === "canvas") {
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		upload_img2($user,$img, "gallery");
	}
	else
		echo "error : unknown sub action";
}

$page = $_GET['page'];
$prev_pos = $_GET['prev_pos'];
if (isset($_POST['sub_action'])){
    $sub = $_POST['sub_action'];
    if ($sub === "editor_redirect")
		header("Location: ../editor.php");
	else
		header("Location: ../index.php?page=$page&prev_pos=$prev_pos");
}
else {
	header("Location: ../index.php?page=$page&prev_pos=$prev_pos");
}
?>