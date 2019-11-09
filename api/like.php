<?php 
//one api
require_once("../header.php");
// session_start();

$user_id = get_specific("id", "users", "username", $_SESSION['user_id']);
$id = $_POST['galleryid'];

$res = is_liked("1", "1", 'like');

print_r($res);

$action = $_REQUEST['operation'];
// if ($res = is_liked($user_id, $id, 'like')) {
//     basic_html("test",$res);
//     print_r($res);
// }
// else if ($action === "like"){
//         add_like($user_id,$id);
// }
$i = $_REQUEST['page'];

// header("Location: ../home_html.php?page=$i");
?>