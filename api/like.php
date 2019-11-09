<?php 
//one api
require_once("../header.php");
// session_start();

// echo "The time is " . date("h:i:sa") . "<br/>";
// echo "post test ok ".$_POST['id']."<br/>";
// print_r($_POST);
// echo "<br/> get test ok <br/>";
// print_r($_GET);

$user_id = get_specific("id", "users", "username", $_SESSION['user_id']);
$id = $_POST['galleryid'];

is_liked("1", "1", 'like');

$action = $_REQUEST['operation'];
if (is_liked($user_id, $id, 'like')) {
    delete_like("like", "userid", $user_id, "galleryid", $id);
}
else if ($action === "like"){
        add_like($user_id,$id);
}
$i = $_REQUEST['page'];
print_r($i);

header("Location: ../home_html.php?page=$i");
?>