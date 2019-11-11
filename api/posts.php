<?php
require_once("../header.php");
session_start();

$galleryid	= $_POST['form_id'];
$action		= $_POST['action'];
$sub_action	= $_POST['sub_action'];
$user		= $_SESSION['user_id'];
$img		= $_POST['img'];

echo "The time is " . date("h:i:sa") . "<br/>";
echo "post test ok ".$_POST['id']."<br/>";
print_r($_POST);
echo "<br/> get test ok <br/>";
print_r($_GET);

if (!isset($_SESSION['user_id'])){
	echo "error : unknown user<br/>";
}
else if ($action === "delete") {
	if (!isset($_REQUEST['form_id']))
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
	else
		echo "error : unknown sub action";
}
$page = $_GET['page'];
header("Location: ../home_html.php?page=$page");
// $i = 1;
// $max = 11;

// while ($i < $max){
// echo "
// <form  action=\"api/posts.php\" method=\"POST\">
// <input type=\"hidden\" name=\"action\" value=\"the desired action\">
// <input type=\"hidden\" name=\"form_id\" value=\"the respective image id\">
// <input type=\"hidded\" name=\"sub_action\" value=\"the sub action\">
// <input type=\"submit\" name=\"sub_action\" value=\"button name\">
// </form>
// ";
// $i++;
?>